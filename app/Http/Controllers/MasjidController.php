<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MasjidController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search  = $request->search;
        $filter  = $request->filter;
        $cabang  = $request->cabang;
        $ranting = $request->ranting;

        $cabangs = Cabang::orderBy('nama_cabang')->get();

        $rantings = collect();

        if ($cabang) {

            $rantings = Ranting::where(
                'cabang_id',
                $cabang
            )
            ->orderBy('nama_ranting')
            ->get();

        }

        $masjids = Masjid::with([
                'ranting',
                'ranting.cabang'
            ])

            /*
            |--------------------------------------------------------------------------
            | SEARCH
            |--------------------------------------------------------------------------
            */

            ->when($search, function ($query) use ($search) {

                $query->where(
                    'nama_masjid',
                    'like',
                    '%' . $search . '%'
                );

            })

            /*
            |--------------------------------------------------------------------------
            | FILTER CABANG
            |--------------------------------------------------------------------------
            */

            ->when($cabang, function ($query) use ($cabang) {

                $query->whereHas('ranting', function ($q) use ($cabang) {

                    $q->where(
                        'cabang_id',
                        $cabang
                    );

                });

            })

            /*
            |--------------------------------------------------------------------------
            | FILTER RANTING
            |--------------------------------------------------------------------------
            */

            ->when($ranting, function ($query) use ($ranting) {

                $query->where(
                    'ranting_id',
                    $ranting
                );

            })

            /*
            |--------------------------------------------------------------------------
            | FILTER STATUS
            |--------------------------------------------------------------------------
            */

            ->when($filter == 'sertifikat', function ($query) {

                $query->where(
                    'status_legalitas',
                    'sertifikat'
                );

            })

            ->when($filter == 'belum', function ($query) {

                $query->where(
                    'status_legalitas',
                    'belum'
                );

            })

            ->when($filter == 'proses', function ($query) {

                $query->where(
                    'status_legalitas',
                    'proses'
                );

            })

            /*
            |--------------------------------------------------------------------------
            | SORT
            |--------------------------------------------------------------------------
            */

            ->when($filter == 'terlama', function ($query) {

                $query->orderBy(
                    'id',
                    'asc'
                );

            })

            ->when(
                $filter == 'terbaru' || !$filter,
                function ($query) {

                    $query->orderBy(
                        'id',
                        'desc'
                    );

                }
            )

            ->paginate(10)

            ->withQueryString();

        return view(
            'unit-lembaga.masjid.index',
            compact(
                'masjids',
                'cabangs',
                'rantings'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $cabangs = Cabang::orderBy(
            'nama_cabang'
        )->get();

        $rantings = Ranting::orderBy(
            'nama_ranting'
        )->get();

        return view(
            'unit-lembaga.masjid.tambah',
            compact(
                'cabangs',
                'rantings'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama_masjid' => 'required|max:150',

            'ranting_id' => 'required',

            'alamat' => 'required',

            'status_legalitas' => 'required'

        ]);

        Masjid::create([

            'nama_masjid' => $request->nama_masjid,

            'ranting_id' => $request->ranting_id,

            'alamat' => $request->alamat,

            'status_legalitas' => $request->status_legalitas

        ]);

        return redirect()

            ->route('masjid.index')

            ->with(
                'success',
                'Data masjid berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        return response()->json(

            Masjid::findOrFail($id)

        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_masjid' => 'required|max:150',

            'ranting_id' => 'required',

            'alamat' => 'required',

            'status_legalitas' => 'required'

        ]);

        $masjid = Masjid::findOrFail($id);

        $masjid->update([

            'nama_masjid' => $request->nama_masjid,

            'ranting_id' => $request->ranting_id,

            'alamat' => $request->alamat,

            'status_legalitas' => $request->status_legalitas

        ]);

        return redirect()

            ->route('masjid.index')

            ->with(
                'success_update',
                'Data masjid berhasil diperbarui'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX RANTING
    |--------------------------------------------------------------------------
    */

    public function getRanting($id)
    {
        $rantings = Ranting::where(
            'cabang_id',
            $id
        )
        ->orderBy('nama_ranting')
        ->get();

        return response()->json($rantings);
    }

    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */

    public function pdf()
    {
        $masjids = Masjid::with([
            'ranting',
            'ranting.cabang'
        ])
        ->orderBy('nama_masjid')
        ->get();

        $pdf = Pdf::loadView(
            'unit-lembaga.masjid.pdf',
            compact('masjids')
        )->setPaper(
            'a4',
            'landscape'
        );

        return $pdf->stream(
            'data-masjid.pdf'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        Masjid::findOrFail($id)->delete();

        return redirect()

            ->route('masjid.index')

            ->with(
                'success_delete',
                'Data masjid berhasil dihapus'
            );
    }
}