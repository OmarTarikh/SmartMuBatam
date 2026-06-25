<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RantingController extends Controller
{
/*
|--------------------------------------------------------------------------
| Tampilkan Data Ranting
|--------------------------------------------------------------------------
*/
    public function index(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;
        $cabang = $request->cabang;

        $cabangs = Cabang::orderBy('nama_cabang')->get();

        $rantings = Ranting::with('cabang')
            ->withCount([
                'anggota',

                'anggota as anggota_aktif_count' => function ($q) {
                    $q->where('status', 'AKTIF');
                },

                'anggota as anggota_vakum_count' => function ($q) {
                    $q->where('status', 'VAKUM');
                },

                'anggota as anggota_kurang_count' => function ($q) {
                    $q->where('status', 'KURANG AKTIF');
                }
            ])
            // SEARCH
            ->when($search, function ($query) use ($search) {

                $query->where(
                    'nama_ranting',
                    'like',
                    '%' . $search . '%'
                );

            })

            // FILTER CABANG
            ->when($cabang, function ($query) use ($cabang) {

                $query->where(
                    'cabang_id',
                    $cabang
                );

            })

            // FILTER STATUS
            ->when($filter == 'AKTIF', function ($query) {

                $query->where(
                    'status',
                    'AKTIF'
                );

            })

            ->when($filter == 'VAKUM', function ($query) {

                $query->where(
                    'status',
                    'VAKUM'
                );

            })

            ->when($filter == 'KURANG AKTIF', function ($query) {

                $query->where(
                    'status',
                    'KURANG AKTIF'
                );

            })

            // URUT TERLAMA
            ->when($filter == 'terlama', function ($query) {

                $query->orderBy(
                    'id',
                    'asc'
                );

            })

            // URUT TERBARU
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
            'organisasi.ranting.index',
            compact(
                'rantings',
                'cabangs'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Form Tambah
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $cabangs = Cabang::orderBy('nama_cabang')->get();

        return view(
            'organisasi.ranting.tambah',
            compact('cabangs')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Simpan Data
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([

            'cabang_id' => 'required',

            'nama_ranting' => 'required|max:100',

            'status' => 'required'

        ]);

        Ranting::create([

            'cabang_id' => $request->cabang_id,

            'nama_ranting' => $request->nama_ranting,

            'status' => $request->status

        ]);

        return redirect()
            ->route('ranting.index')
            ->with(
                'success',
                'Ranting berhasil ditambahkan'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */
    public function edit(string $id)
    {
        $ranting = Ranting::findOrFail($id);

        $cabangs = Cabang::orderBy('nama_cabang')->get();

        return view(
            'organisasi.ranting.edit',
            compact(
                'ranting',
                'cabangs'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'cabang_id' => 'required',

            'nama_ranting' => 'required|max:100',

            'status' => 'required'

        ]);

        $ranting = Ranting::findOrFail($id);

        $ranting->update([

            'cabang_id' => $request->cabang_id,

            'nama_ranting' => $request->nama_ranting,

            'status' => $request->status

        ]);

        return redirect()
            ->route('ranting.index')
            ->with(
                'success_update',
                'Ranting berhasil diperbarui'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PDF
    |--------------------------------------------------------------------------
    */
    public function pdf()
    {
        $rantings = Ranting::with('cabang')
            ->orderBy('id')
            ->get();

        $pdf = Pdf::loadView(
            'organisasi.ranting.pdf',
            compact('rantings')
        );

        return $pdf->stream('data-ranting.pdf');
    }


    /*
    |--------------------------------------------------------------------------
    | Hapus
    |--------------------------------------------------------------------------
    */
    public function destroy(string $id)
    {
        $ranting = Ranting::findOrFail($id);

        $ranting->delete();

        return redirect()
            ->route('ranting.index')
            ->with(
                'success_delete',
                'Ranting berhasil dihapus'
            );
    }
}