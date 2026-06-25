<?php

namespace App\Http\Controllers;

use App\Models\Aum;
use App\Models\Cabang;
use App\Models\Ranting;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AumController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DATA AUM SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function sekolah(Request $request)
    {
        $search  = $request->search;
        $filter  = $request->filter;
        $cabang  = $request->cabang;
        $ranting = $request->ranting;

        $cabangs = Cabang::orderBy('nama_cabang')->get();

        /*
        |--------------------------------------------------------------------------
        | Ambil SEMUA ranting
        |--------------------------------------------------------------------------
        */

        $rantings = Ranting::orderBy('nama_ranting')->get();
                $aums = Aum::with([
                        'cabang',
                        'ranting'
                    ])

                    ->where(
                        'jenis',
                        'sekolah'
                    )

            /*
            |--------------------------------------------------------------------------
            | SEARCH
            |--------------------------------------------------------------------------
            */

            ->when($search,function($query) use($search){

                $query->where(function($q) use($search){

                    $q->where(
                        'nama_aum',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'alamat',
                        'like',
                        "%{$search}%"
                    );

                });

            })

            /*
            |--------------------------------------------------------------------------
            | FILTER CABANG
            |--------------------------------------------------------------------------
            */

            ->when($cabang,function($query) use($cabang){

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

            ->when($ranting,function($query) use($ranting){

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

            ->when($filter == 'aktif',function($query){

                $query->where(
                    'status_perizinan',
                    'aktif'
                );

            })

            ->when($filter == 'tidak_aktif',function($query){

                $query->where(
                    'status_perizinan',
                    'tidak aktif'
                );

            })

            ->when($filter == 'proses_izin',function($query){

                $query->where(
                    'status_perizinan',
                    'proses izin'
                );

            })

            /*
            |--------------------------------------------------------------------------
            | SORT
            |--------------------------------------------------------------------------
            */

            ->when($filter == 'terlama',function($query){

                $query->orderBy(
                    'id',
                    'asc'
                );

            })

            ->when(

                $filter == 'terbaru' || !$filter,

                function($query){

                    $query->orderBy(
                        'id',
                        'desc'
                    );

                }

            )

            ->paginate(10)

            ->withQueryString();

        return view(

            'unit-lembaga.aum.sekolah.index',

            compact(

                'aums',

                'cabangs',

                'rantings'

            )

        );

    }


    /*
    |--------------------------------------------------------------------------
    | DATA AUM KLINIK
    |--------------------------------------------------------------------------
    */

    public function klinik(Request $request)
    {
        $search  = $request->search;
        $filter  = $request->filter;
        $cabang  = $request->cabang;
        $ranting = $request->ranting;

        $cabangs = Cabang::orderBy(
            'nama_cabang'
        )->get();

        $rantings = collect();

        if($cabang){

            $rantings = Ranting::where(

                'cabang_id',

                $cabang

            )

            ->orderBy('nama_ranting')

            ->get();

        }

        $aums = Aum::with([

                'cabang',

                'ranting'

            ])

            ->where(

                'jenis',

                'klinik'

            )

            /*
            |--------------------------------------------------------------------------
            | SEARCH
            |--------------------------------------------------------------------------
            */

            ->when($search,function($query) use($search){

                $query->where(function($q) use($search){

                    $q->where(

                        'nama_aum',

                        'like',

                        "%{$search}%"

                    )

                    ->orWhere(

                        'alamat',

                        'like',

                        "%{$search}%"

                    );

                });

            })

            /*
            |--------------------------------------------------------------------------
            | FILTER CABANG
            |--------------------------------------------------------------------------
            */

            ->when($cabang,function($query) use($cabang){

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

            ->when($ranting,function($query) use($ranting){

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

            ->when($filter == 'aktif',function($query){

                $query->where(

                    'status_perizinan',

                    'aktif'

                );

            })

            ->when($filter == 'tidak_aktif',function($query){

                $query->where(

                    'status_perizinan',

                    'tidak aktif'

                );

            })

            ->when($filter == 'proses_izin',function($query){

                $query->where(

                    'status_perizinan',

                    'proses izin'

                );

            })

            /*
            |--------------------------------------------------------------------------
            | SORT
            |--------------------------------------------------------------------------
            */

            ->when($filter == 'terlama',function($query){

                $query->orderBy(

                    'id',

                    'asc'

                );

            })

            ->when(

                $filter == 'terbaru' || !$filter,

                function($query){

                    $query->orderBy(

                        'id',

                        'desc'

                    );

                }

            )

            ->paginate(10)

            ->withQueryString();

        return view(

            'unit-lembaga.aum.klinik.index',

            compact(

                'aums',

                'cabangs',

                'rantings'

            )

        );

    }

        /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH SEKOLAH
    |--------------------------------------------------------------------------
    */
    public function createSekolah()
    {
        $cabangs = Cabang::orderBy(
            'nama_cabang'
        )->get();

        $rantings = Ranting::orderBy(
            'nama_ranting'
        )->get();

        return view(
            'unit-lembaga.aum.sekolah.tambah',
            compact(
                'cabangs',
                'rantings'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH KLINIK
    |--------------------------------------------------------------------------
    */
    public function createKlinik()
    {
        $cabangs = Cabang::orderBy(
            'nama_cabang'
        )->get();

        $rantings = Ranting::orderBy(
            'nama_ranting'
        )->get();

        return view(
            'unit-lembaga.aum.klinik.tambah',
            compact(
                'cabangs',
                'rantings'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN DATA AUM
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([

            'nama_aum'         => 'required|max:150',

            'jenis'            => 'required|in:sekolah,klinik',

            'cabang_id'        => 'required',

            'ranting_id'       => 'required',

            'alamat'           => 'required',

            'jumlah_siswa'     => 'nullable|integer',

            'jumlah_guru'      => 'nullable|integer',

            'akreditasi'       => 'nullable|max:10',

            'tahun'            => 'nullable|digits:4',

            'jumlah_pasien'    => 'nullable|integer',

            'jumlah_dokter'    => 'nullable|integer',

            'kapasitas'        => 'nullable|integer',

            'status_perizinan' => 'required',

            'bulan'            => 'nullable|max:20'

        ]);

        Aum::create([

            'nama_aum'         => $request->nama_aum,

            'jenis'            => $request->jenis,

            'cabang_id'        => $request->cabang_id,

            'ranting_id'       => $request->ranting_id,

            'alamat'           => $request->alamat,

            'jumlah_siswa'     => $request->jumlah_siswa,

            'jumlah_guru'      => $request->jumlah_guru,

            'akreditasi'       => $request->akreditasi,

            'tahun'            => $request->tahun,

            'jumlah_pasien'    => $request->jumlah_pasien,

            'jumlah_dokter'    => $request->jumlah_dokter,

            'kapasitas'        => $request->kapasitas,

            'status_perizinan' => $request->status_perizinan,

            'bulan'            => $request->bulan

        ]);

        if ($request->jenis == 'sekolah') {

            return redirect()
                ->route('aum.sekolah')
                ->with(
                    'success',
                    'Data sekolah berhasil ditambahkan'
                );

        }

        return redirect()
            ->route('aum.klinik')
            ->with(
                'success',
                'Data klinik berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX RANTING BERDASARKAN CABANG
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
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit(string $id)
    {
        $aum = Aum::findOrFail($id);

        return response()->json($aum);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'nama_aum'         => 'required|max:150',

            'cabang_id'        => 'required',

            'ranting_id'       => 'required',

            'alamat'           => 'required',

            'jumlah_siswa'     => 'nullable|integer',

            'jumlah_guru'      => 'nullable|integer',

            'akreditasi'       => 'nullable|max:10',

            'tahun'            => 'nullable|digits:4',

            'jumlah_pasien'    => 'nullable|integer',

            'jumlah_dokter'    => 'nullable|integer',

            'kapasitas'        => 'nullable|integer',

            'status_perizinan' => 'required',

            'bulan'            => 'nullable|max:20'

        ]);

        $aum = Aum::findOrFail($id);

        $aum->update([

            'nama_aum'         => $request->nama_aum,

            'cabang_id'        => $request->cabang_id,

            'ranting_id'       => $request->ranting_id,

            'alamat'           => $request->alamat,

            'jumlah_siswa'     => $request->jumlah_siswa,

            'jumlah_guru'      => $request->jumlah_guru,

            'akreditasi'       => $request->akreditasi,

            'tahun'            => $request->tahun,

            'jumlah_pasien'    => $request->jumlah_pasien,

            'jumlah_dokter'    => $request->jumlah_dokter,

            'kapasitas'        => $request->kapasitas,

            'status_perizinan' => $request->status_perizinan,

            'bulan'            => $request->bulan

        ]);

        if ($aum->jenis == 'sekolah') {

            return redirect()
                ->route('aum.sekolah')
                ->with(
                    'success_update',
                    'Data sekolah berhasil diperbarui'
                );

        }

        return redirect()
            ->route('aum.klinik')
            ->with(
                'success_update',
                'Data klinik berhasil diperbarui'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | PDF SEKOLAH
    |--------------------------------------------------------------------------
    */
    public function pdfSekolah()
    {
        $aums = Aum::with([
            'cabang',
            'ranting'
        ])
        ->where('jenis', 'sekolah')
        ->orderBy('nama_aum')
        ->get();

        $pdf = Pdf::loadView(
            'unit-lembaga.aum.sekolah.pdf',
            compact('aums')
        )->setPaper('a4', 'landscape');

        return $pdf->stream('data-aum-sekolah.pdf');
    }
    /*
    |--------------------------------------------------------------------------
    | PDF KLINIK
    |--------------------------------------------------------------------------
    */
    public function pdfKlinik()
    {
        $aums = Aum::with([
                'cabang',
                'ranting'
            ])
            ->where('jenis', 'klinik')
            ->orderBy('id')
            ->get();

        $pdf = Pdf::loadView(
            'unit-lembaga.aum.klinik.pdf',
            compact('aums')
        )->setPaper('a4', 'landscape');

        return $pdf->stream(
            'data-klinik.pdf'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(string $id)
    {
        $aum = Aum::findOrFail($id);

        $jenis = $aum->jenis;

        $aum->delete();

        if ($jenis == 'sekolah') {

            return redirect()
                ->route('aum.sekolah')
                ->with(
                    'success_delete',
                    'Data sekolah berhasil dihapus'
                );

        }

        return redirect()
            ->route('aum.klinik')
            ->with(
                'success_delete',
                'Data klinik berhasil dihapus'
            );
    }

}