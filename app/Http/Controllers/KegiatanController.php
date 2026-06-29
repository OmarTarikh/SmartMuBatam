<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KegiatanController extends Controller
{

/*
|--------------------------------------------------------------------------
| DATA KEGIATAN
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{
    $search = $request->search;

    $filter = $request->filter;

    $jenis = $request->jenis;

    $cabang = $request->cabang;

    $cabangs = Cabang::all();

    $kegiatans = Kegiatan::with('cabang')

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('nama_kegiatan', 'like', "%{$search}%")

                    ->orWhere('deskripsi', 'like', "%{$search}%")

                    ->orWhere('target', 'like', "%{$search}%")

                    ->orWhere('lokasi', 'like', "%{$search}%")

                    ->orWhere('jenis', 'like', "%{$search}%")

                    ->orWhereHas('cabang', function ($c) use ($search) {

                        $c->where('nama_cabang', 'like', "%{$search}%");

                    });

            });

        })

        /*
        |--------------------------------------------------------------------------
        | FILTER CABANG
        |--------------------------------------------------------------------------
        */

        ->when($cabang, function ($query) use ($cabang) {

            $query->where('cabang_id', $cabang);

        })

        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS
        |--------------------------------------------------------------------------
        */

        ->when($jenis, function ($query) use ($jenis) {

            $query->where('jenis', $jenis);

        })

        /*
        |--------------------------------------------------------------------------
        | SORT
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'terlama', function ($query) {

            $query->orderBy('tanggal_mulai', 'asc');

        })

        ->when($filter == 'terbaru' || !$filter, function ($query) {

            $query->orderBy('tanggal_mulai', 'desc');

        })

        ->paginate(10)

        ->withQueryString();

    return view(

        'kegiatan.index',

        compact(

            'kegiatans',

            'cabangs'

        )

    );
}

/*
|--------------------------------------------------------------------------
| FORM TAMBAH
|--------------------------------------------------------------------------
*/

public function create()
{
    $cabangs = Cabang::orderBy('nama_cabang')->get();

    return view(

        'kegiatan.tambah',

        compact(

            'cabangs'

        )

    );
}
/*
|--------------------------------------------------------------------------
| SIMPAN DATA
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{

    $request->validate([

        'cabang_id'       => 'required|exists:cabang,id',

        'nama_kegiatan'   => 'required|max:255',

        'jenis'           => 'required|in:agenda,program_kerja',

        'deskripsi'       => 'required',

        'target'          => 'required|max:255',

        'progres_persen'  => 'required|integer|min:0|max:100',

        'tanggal_mulai'   => 'required|date',

        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',

        'lokasi'          => 'required|max:255',

    ]);
    Kegiatan::create([

        'cabang_id'       => $request->cabang_id,

        'nama_kegiatan'   => $request->nama_kegiatan,

        'jenis'           => $request->jenis,

        'deskripsi'       => $request->deskripsi,

        'target'          => $request->target,

        'progres_persen'  => $request->progres_persen,

        'tanggal_mulai'   => $request->tanggal_mulai,

        'tanggal_selesai' => $request->tanggal_selesai,

        'lokasi'          => $request->lokasi,

    ]);
    return redirect()

        ->route('kegiatan')

        ->with(

            'success',

            'Data kegiatan berhasil ditambahkan.'

        );

}

/*
|--------------------------------------------------------------------------
| UPDATE DATA
|--------------------------------------------------------------------------
*/

public function update(Request $request, $id)
{

    $request->validate([

        'nama_kegiatan'   => 'required|max:255',

        'cabang_id' => 'required|exists:cabang,id',

        'jenis'           => 'required|in:agenda,program_kerja',

        'deskripsi'       => 'required',

        'target'          => 'required|max:255',

        'progres_persen'  => 'required|integer|min:0|max:100',

        'tanggal_mulai'   => 'required|date',

        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',

        'lokasi'          => 'required|max:255',

    ]);

    $kegiatan = Kegiatan::findOrFail($id);

    $kegiatan->update([

        'nama_kegiatan'   => $request->nama_kegiatan,

        'cabang_id' => $request->cabang_id,

        'jenis'           => $request->jenis,

        'deskripsi'       => $request->deskripsi,

        'target'          => $request->target,

        'progres_persen'  => $request->progres_persen,

        'tanggal_mulai'   => $request->tanggal_mulai,

        'tanggal_selesai' => $request->tanggal_selesai,

        'lokasi'          => $request->lokasi,

    ]);

    return redirect()

        ->route('kegiatan')

        ->with(

            'success',

            'Data kegiatan berhasil diperbarui.'

        );

}

/*
|--------------------------------------------------------------------------
| EXPORT PDF
|--------------------------------------------------------------------------
*/

public function pdf(Request $request)
{

    $jenis = $request->jenis;

    $search = $request->search;

    $filter = $request->filter;

    $kegiatans = Kegiatan::query()

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('nama_kegiatan','like',"%{$search}%")

                ->orWhere('deskripsi','like',"%{$search}%")

                ->orWhere('target','like',"%{$search}%")

                ->orWhere('lokasi','like',"%{$search}%")

                ->orWhere('jenis','like',"%{$search}%");
            });

        })

        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS
        |--------------------------------------------------------------------------
        */

        ->when($jenis, function ($query) use ($jenis) {

            $query->where('jenis', $jenis);

        })

        /*
        |--------------------------------------------------------------------------
        | SORT
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'terlama', function ($query) {

            $query->orderBy('tanggal_mulai', 'asc');

        })

        ->when($filter == 'terbaru' || !$filter, function ($query) {

            $query->orderBy('tanggal_mulai', 'desc');

        })

        ->get();

        $pdf = Pdf::loadView(

            'kegiatan.pdf',

            [

                'kegiatans' => $kegiatans,

                'jenis' => $jenis

            ]

        )->setPaper('a4', 'landscape');

        return $pdf->stream('data-kegiatan.pdf');

        }

/*
|--------------------------------------------------------------------------
| HAPUS DATA
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    $kegiatan = Kegiatan::findOrFail($id);

    $kegiatan->delete();

    return redirect()

        ->route('kegiatan')

        ->with(

            'success',

            'Data kegiatan berhasil dihapus.'

        );

}
}