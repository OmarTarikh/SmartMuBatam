<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CabangController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tampilkan Data Cabang
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        $cabangs = Cabang::query()

            // SEARCH
            ->when($search, function ($query) use ($search) {

                $query->where(
                    'nama_cabang',
                    'like',
                    '%' . $search . '%'
                );

            })

            // FILTER
            ->when($filter == 'AKTIF', function ($query) {

                $query->where('status', 'AKTIF');

            })

            ->when($filter == 'NONAKTIF', function ($query) {

                $query->where('status', 'NONAKTIF');

            })

            ->when($filter == 'KURANG AKTIF', function ($query) {

                $query->where('status', 'KURANG AKTIF');

            })

            ->when($filter == 'terlama', function ($query) {

                $query->orderBy('id', 'asc');

            })

            ->when(
                $filter == 'terbaru' || !$filter,
                function ($query) {

                    $query->orderBy('id', 'desc');

                }
            )

            ->paginate(10)

            ->withQueryString();

        return view(
            'organisasi.cabang.index',
            compact('cabangs')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Tambah Cabang
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('organisasi.cabang.tambah');
    }


    /*
    |--------------------------------------------------------------------------
    | Simpan Cabang Baru
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|max:100',
            'status' => 'required'
        ]);

        Cabang::create([
            'nama_cabang' => $request->nama_cabang,
            'status' => $request->status
        ]);

        return redirect()
                ->route('cabang.index')
                ->with(
                    'success',
                    'Cabang berhasil ditambahkan'
                );
    }


    /*
    |--------------------------------------------------------------------------
    | Halaman Edit
    |--------------------------------------------------------------------------
    */
    public function edit(string $id)
    {
        $cabang = Cabang::findOrFail($id);

        return view(
            'organisasi.cabang.edit',
            compact('cabang')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Cabang
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_cabang' => 'required|max:100',
            'status' => 'required'
        ]);

        $cabang = Cabang::findOrFail($id);

        $cabang->update([
            'nama_cabang' => $request->nama_cabang,
            'status' => $request->status
        ]);

        return redirect()
                ->route('cabang.index')
                ->with(
                    'success_update',
                    'Cabang berhasil diperbarui'
                );
    }

    /*
    |--------------------------------------------------------------------------
    | Cetak PDF Cabang
    |--------------------------------------------------------------------------
    */

    public function pdf()
    {
        $cabangs = Cabang::orderBy('id')->get();

        $pdf = Pdf::loadView(
            'organisasi.cabang.pdf',
            compact('cabangs')
        );

        return $pdf->stream('data-cabang.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus Cabang
    |--------------------------------------------------------------------------
    */
    public function destroy(string $id)
    {
        $cabang = Cabang::findOrFail($id);

        $cabang->delete();

        return redirect()
                ->route('cabang.index')
                ->with(
                    'success_delete',
                    'Cabang berhasil dihapus'
                );
    }
}