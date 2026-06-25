<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AnggotaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tampilkan Data Anggota
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $search  = $request->search;
        $filter  = $request->filter;
        $cabang  = $request->cabang;
        $ranting = $request->ranting;

        $cabangs = Cabang::orderBy('nama_cabang')->get();

        // dropdown ranting mengikuti cabang yang dipilih
        $rantings = collect();

        if ($cabang) {

            $rantings = Ranting::where(
                'cabang_id',
                $cabang
            )
            ->orderBy('nama_ranting')
            ->get();

        }

        $anggotas = Anggota::with([
                'cabang',
                'ranting'
            ])

            /*
            |--------------------------------------------------------------------------
            | SEARCH
            |--------------------------------------------------------------------------
            */
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where(
                        'nama',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhere(
                        'nik',
                        'like',
                        '%' . $search . '%'
                    );

                });

            })

            /*
            |--------------------------------------------------------------------------
            | FILTER CABANG
            |--------------------------------------------------------------------------
            */
            ->when($cabang, function ($query) use ($cabang) {

                $query->where(
                    'cabang_id',
                    $cabang
                );

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
            | FILTER STATUS KEANGGOTAAN
            |--------------------------------------------------------------------------
            */
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
                    'nik',
                    'asc'
                );

            })

            // URUT TERBARU
            ->when(
                $filter == 'terbaru' || !$filter,
                function ($query) {

                    $query->orderBy(
                        'nik',
                        'desc'
                    );

                }
            )

            ->paginate(10)

            ->withQueryString();

        return view(
            'organisasi.anggota.index',
            compact(
                'anggotas',
                'cabangs',
                'rantings'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Form Edit
    |--------------------------------------------------------------------------
    */

    public function edit(string $nik)
    {
        $anggota = Anggota::findOrFail($nik);

        return response()->json($anggota);
    }
    public function update(Request $request, $nik)
    {
        $anggota = Anggota::where('nik', $nik)->firstOrFail();

        $anggota->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'cabang_id' => $request->cabang_id,
            'ranting_id' => $request->ranting_id,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('anggota.index')
            ->with('success_update', 'Data anggota berhasil diperbarui');
    }
    /*
    |--------------------------------------------------------------------------
    | Form Tambah
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
            'organisasi.anggota.tambah',
            compact(
                'cabangs',
                'rantings'
            )
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

            'nik'                 => 'required|max:20',

            'nama'                => 'required|max:100',

            'jenis_kelamin'       => 'required',

            'tanggal_lahir'       => 'required|date',

            'alamat'              => 'required',

            'cabang_id'           => 'required',

            'ranting_id'          => 'required',

            'pekerjaan'           => 'required|max:100',

            'pendidikan'          => 'required|max:100',

            'status'  => 'required'

        ]);
        Anggota::create([

            'nik'                => $request->nik,

            'nama'               => $request->nama,

            'jenis_kelamin'      => $request->jenis_kelamin,

            'tanggal_lahir'      => $request->tanggal_lahir,

            'alamat'             => $request->alamat,

            'cabang_id'          => $request->cabang_id,

            'ranting_id'         => $request->ranting_id,

            'pekerjaan'          => $request->pekerjaan,

            'pendidikan'         => $request->pendidikan,

            'status' => $request->status

        ]);

        return redirect()
            ->route('anggota.index')
            ->with(
                'success',
                'Anggota berhasil ditambahkan'
            );
    }
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
        $anggotas = Anggota::with([
            'cabang',
            'ranting'
        ])
        ->orderBy('nik')
        ->get();

        $pdf = Pdf::loadView(
            'organisasi.anggota.pdf',
            compact('anggotas')
        )->setPaper('a4', 'landscape');

        return $pdf->stream('data-anggota.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | Hapus
    |--------------------------------------------------------------------------
    */
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);

        $anggota->delete();

        return redirect()
            ->route('anggota.index')
            ->with(
                'success_delete',
                'Anggota berhasil dihapus'
            );
    }
}