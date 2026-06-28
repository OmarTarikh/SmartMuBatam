<?php

namespace App\Http\Controllers;

use App\Models\AsetKeuangan;
use App\Models\AsetKas;
use App\Models\AsetWakaf;
use App\Models\AsetInfaq;
use App\Models\AsetSedekah;
use App\Models\Cabang;
use App\Models\Masjid;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganController extends Controller
{
/*
|--------------------------------------------------------------------------
| DATA KAS
|--------------------------------------------------------------------------
*/

public function indexKas(Request $request)
{
    $search = $request->search;

    $filter = $request->filter;

    $cabang = $request->cabang;

    $cabangs = Cabang::orderBy('nama_cabang')->get();

    $kas = AsetKeuangan::with([

            'cabang',

            'kas'

        ])

        ->where('jenis', 'kas')

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('lokasi', 'like', "%{$search}%")
                ->orWhere('tanggal', 'like', "%{$search}%")

                ->orWhereHas('cabang', function ($c) use ($search) {

                        $c->where('nama_cabang', 'like', "%{$search}%");

                })

                ->orWhereHas('kas', function ($kas) use ($search) {

                        $kas->where('keterangan', 'like', "%{$search}%")
                            ->orWhere('tipe', 'like', "%{$search}%")
                            ->orWhere('jumlah', 'like', "%{$search}%");

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
        | FILTER TIPE
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'masuk', function ($query) {

            $query->whereHas('kas', function ($q) {

                $q->where('tipe', 'masuk');

            });

        })

        ->when($filter == 'keluar', function ($query) {

            $query->whereHas('kas', function ($q) {

                $q->where('tipe', 'keluar');

            });

        })

        /*
        |--------------------------------------------------------------------------
        | SORT
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'terlama', function ($query) {

            $query->orderBy('id');

        })

        ->when($filter == 'terbaru' || !$filter, function ($query) {

            $query->orderByDesc('id');

        })

        ->paginate(10)

        ->withQueryString();

    return view(

        'keuangan.kas.index',

        compact(

            'kas',

            'cabangs'

        )

    );
}
/*
|--------------------------------------------------------------------------
| DATA WAKAF
|--------------------------------------------------------------------------
*/

public function indexWakaf(Request $request)
{
    $search = $request->search;

    $filter = $request->filter;

    $cabang = $request->cabang;

    $cabangs = Cabang::orderBy('nama_cabang')->get();

    $wakafs = AsetKeuangan::with([

            'cabang',

            'wakaf'

        ])

        ->where('jenis', 'wakaf')

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('lokasi', 'like', "%{$search}%")
                ->orWhere('tanggal', 'like', "%{$search}%")

                ->orWhereHas('cabang', function ($c) use ($search) {

                        $c->where('nama_cabang', 'like', "%{$search}%");

                })

                ->orWhereHas('wakaf', function ($wakaf) use ($search) {

                        $wakaf->where('keterangan', 'like', "%{$search}%")
                            ->orWhere('jumlah', 'like', "%{$search}%");

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
        | SORT
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'terlama', function ($query) {

            $query->orderBy('id');

        })

        ->when($filter == 'terbaru' || !$filter, function ($query) {

            $query->orderByDesc('id');

        })

        ->paginate(10)

        ->withQueryString();

    return view(

        'keuangan.wakaf.index',

        compact(

            'wakafs',

            'cabangs'

        )

    );
}
/*
|--------------------------------------------------------------------------
| DATA INFAQ
|--------------------------------------------------------------------------
*/

public function indexInfaq(Request $request)
{
    $search = $request->search;

    $filter = $request->filter;

    $cabang = $request->cabang;

    $cabangs = Cabang::orderBy('nama_cabang')->get();

    $masjids = Masjid::orderBy('nama_masjid')->get();

    $infaqs = AsetKeuangan::with([

            'cabang',

            'masjid',

            'infaq'

        ])

        ->where('jenis', 'infaq')

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('lokasi', 'like', "%{$search}%")
                ->orWhere('tanggal', 'like', "%{$search}%")

                ->orWhereHas('cabang', function ($c) use ($search) {

                        $c->where('nama_cabang', 'like', "%{$search}%");

                })

                ->orWhereHas('masjid', function ($m) use ($search) {

                        $m->where('nama_masjid', 'like', "%{$search}%");

                })

                ->orWhereHas('infaq', function ($infaq) use ($search) {

                        $infaq->where('keterangan', 'like', "%{$search}%")
                            ->orWhere('jumlah', 'like', "%{$search}%");

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
        | SORT
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'terlama', function ($query) {

            $query->orderBy('id');

        })

        ->when($filter == 'terbaru' || !$filter, function ($query) {

            $query->orderByDesc('id');

        })

        ->paginate(10)

        ->withQueryString();

    return view(

        'keuangan.infaq.index',

        compact(

            'infaqs',

            'cabangs',

            'masjids'

        )

    );
}
/*
|--------------------------------------------------------------------------
| DATA SEDEKAH
|--------------------------------------------------------------------------
*/

public function indexSedekah(Request $request)
{
    $search = $request->search;

    $filter = $request->filter;

    $cabang = $request->cabang;

    $cabangs = Cabang::orderBy('nama_cabang')->get();

    $masjids = Masjid::orderBy('nama_masjid')->get();

    $sedekahs = AsetKeuangan::with([

            'cabang',

            'masjid',

            'sedekah'

        ])

        ->where('jenis', 'sedekah')

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('lokasi', 'like', "%{$search}%")
                ->orWhere('tanggal', 'like', "%{$search}%")

                ->orWhereHas('cabang', function ($c) use ($search) {

                        $c->where('nama_cabang', 'like', "%{$search}%");

                })

                ->orWhereHas('masjid', function ($m) use ($search) {

                        $m->where('nama_masjid', 'like', "%{$search}%");

                })

                ->orWhereHas('sedekah', function ($sedekah) use ($search) {

                        $sedekah->where('keterangan', 'like', "%{$search}%")
                                ->orWhere('jumlah', 'like', "%{$search}%");

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
        | SORT
        |--------------------------------------------------------------------------
        */

        ->when($filter == 'terlama', function ($query) {

            $query->orderBy('id');

        })

        ->when($filter == 'terbaru' || !$filter, function ($query) {

            $query->orderByDesc('id');

        })

        ->paginate(10)

        ->withQueryString();

    return view(

        'keuangan.sedekah.index',

        compact(

            'sedekahs',

            'cabangs',

            'masjids'

        )

    );
}
/*
|--------------------------------------------------------------------------
| FORM TAMBAH KAS
|--------------------------------------------------------------------------
*/

public function createKas()
{
    $cabangs = Cabang::orderBy('nama_cabang')->get();

    return view(

        'keuangan.kas.tambah',

        compact(

            'cabangs'

        )

    );
}
/*
|--------------------------------------------------------------------------
| FORM TAMBAH WAKAF
|--------------------------------------------------------------------------
*/

public function createWakaf()
{
    $cabangs = Cabang::orderBy('nama_cabang')->get();

    return view(

        'keuangan.wakaf.tambah',

        compact(

            'cabangs'

        )

    );
}
/*
|--------------------------------------------------------------------------
| FORM TAMBAH INFAQ
|--------------------------------------------------------------------------
*/

public function createInfaq()
{
    $cabangs = Cabang::orderBy('nama_cabang')->get();

    $masjids = Masjid::with('ranting')

        ->orderBy('nama_masjid')

        ->get();

    return view(

        'keuangan.infaq.tambah',

        compact(

            'cabangs',

            'masjids'

        )

    );
}
/*
|--------------------------------------------------------------------------
| FORM TAMBAH SEDEKAH
|--------------------------------------------------------------------------
*/

public function createSedekah()
{
    $cabangs = Cabang::orderBy('nama_cabang')->get();

    $masjids = Masjid::with('ranting')

        ->orderBy('nama_masjid')

        ->get();

    return view(

        'keuangan.sedekah.tambah',

        compact(

            'cabangs',

            'masjids'

        )

    );
}
/*
|--------------------------------------------------------------------------
| SIMPAN DATA KEUANGAN
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{
    $request->validate([

        'jenis'       => 'required|in:kas,wakaf,infaq,sedekah',

        'cabang_id'   => 'required|exists:cabang,id',

        'masjid_id'   => 'nullable|exists:masjid,id',

        'lokasi'      => 'required|max:255',

        'tanggal'     => 'required|date',

        // Kas
        'tipe'        => 'nullable|in:masuk,keluar',

        // Detail
        'jumlah'      => 'required|numeric|min:0',

        'keterangan'  => 'nullable|string'

    ]);

    /*
    |--------------------------------------------------------------------------
    | SIMPAN MASTER
    |--------------------------------------------------------------------------
    */

    $aset = AsetKeuangan::create([

        'jenis'      => $request->jenis,

        'cabang_id'  => $request->cabang_id,

        'masjid_id'  => $request->masjid_id,

        'lokasi'     => $request->lokasi,

        'tanggal'    => $request->tanggal

    ]);

    /*
    |--------------------------------------------------------------------------
    | DETAIL KAS
    |--------------------------------------------------------------------------
    */

    if ($request->jenis == 'kas') {

        AsetKas::create([

            'aset_keuangan_id' => $aset->id,

            'tipe'             => $request->tipe,

            'jumlah'           => $request->jumlah,

            'keterangan'       => $request->keterangan

        ]);

        return redirect()
            ->route('keuangan.kas')
            ->with(
                'success',
                'Data kas berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL WAKAF
    |--------------------------------------------------------------------------
    */

    if ($request->jenis == 'wakaf') {

        AsetWakaf::create([

            'aset_keuangan_id' => $aset->id,

            'jumlah'           => $request->jumlah,

            'keterangan'       => $request->keterangan

        ]);

        return redirect()
            ->route('keuangan.wakaf')
            ->with(
                'success',
                'Data wakaf berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL INFAQ
    |--------------------------------------------------------------------------
    */

    if ($request->jenis == 'infaq') {

        AsetInfaq::create([

            'aset_keuangan_id' => $aset->id,

            'jumlah'           => $request->jumlah,

            'keterangan'       => $request->keterangan

        ]);

        return redirect()
            ->route('keuangan.infaq')
            ->with(
                'success',
                'Data infaq berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL SEDEKAH
    |--------------------------------------------------------------------------
    */

    AsetSedekah::create([

        'aset_keuangan_id' => $aset->id,

        'jumlah'           => $request->jumlah,

        'keterangan'       => $request->keterangan

    ]);

    return redirect()
        ->route('keuangan.sedekah')
        ->with(
            'success',
            'Data sedekah berhasil ditambahkan'
        );
}
/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit(string $id)
{
    $aset = AsetKeuangan::with([

        'kas',

        'wakaf',

        'infaq',

        'sedekah'

    ])->findOrFail($id);

    return response()->json($aset);
}
/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/

public function update(Request $request, string $id)
{
    $request->validate([

        'cabang_id'   => 'required|exists:cabang,id',

        'masjid_id'   => 'nullable|exists:masjid,id',

        'lokasi'      => 'required|max:255',

        'tanggal'     => 'required|date',

        'jumlah'      => 'required|numeric|min:0',

        'keterangan'  => 'nullable|string',

        'tipe'        => 'nullable|in:masuk,keluar'

    ]);

    /*
    |--------------------------------------------------------------------------
    | MASTER
    |--------------------------------------------------------------------------
    */

    $aset = AsetKeuangan::findOrFail($id);

    $aset->update([

        'cabang_id' => $request->cabang_id,

        'masjid_id' => $request->masjid_id,

        'lokasi'    => $request->lokasi,

        'tanggal'   => $request->tanggal

    ]);

    /*
    |--------------------------------------------------------------------------
    | KAS
    |--------------------------------------------------------------------------
    */

    if ($aset->jenis == 'kas') {

        $aset->kas()->update([

            'tipe' => $request->tipe,

            'jumlah' => $request->jumlah,

            'keterangan' => $request->keterangan

        ]);

        return redirect()

            ->route('keuangan.kas')

            ->with(

                'success_update',

                'Data kas berhasil diperbarui'

            );

    }

    /*
    |--------------------------------------------------------------------------
    | WAKAF
    |--------------------------------------------------------------------------
    */

    if ($aset->jenis == 'wakaf') {

        $aset->wakaf()->update([

            'jumlah' => $request->jumlah,

            'keterangan' => $request->keterangan

        ]);

        return redirect()

            ->route('keuangan.wakaf')

            ->with(

                'success_update',

                'Data wakaf berhasil diperbarui'

            );

    }

    /*
    |--------------------------------------------------------------------------
    | INFAQ
    |--------------------------------------------------------------------------
    */

    if ($aset->jenis == 'infaq') {

        $aset->infaq()->update([

            'jumlah' => $request->jumlah,

            'keterangan' => $request->keterangan

        ]);

        return redirect()

            ->route('keuangan.infaq')

            ->with(

                'success_update',

                'Data infaq berhasil diperbarui'

            );

    }

    /*
    |--------------------------------------------------------------------------
    | SEDEKAH
    |--------------------------------------------------------------------------
    */

    $aset->sedekah()->update([

        'jumlah' => $request->jumlah,

        'keterangan' => $request->keterangan

    ]);

    return redirect()

        ->route('keuangan.sedekah')

        ->with(

            'success_update',

            'Data sedekah berhasil diperbarui'

        );
}
/*
|--------------------------------------------------------------------------
| AJAX MASJID BERDASARKAN CABANG
|--------------------------------------------------------------------------
*/

public function getMasjid($id)
{
    $masjids = Masjid::where(
            'cabang_id',
            $id
        )
        ->orderBy('nama_masjid')
        ->get();

    return response()->json($masjids);
}
/*
|--------------------------------------------------------------------------
| PDF KAS
|--------------------------------------------------------------------------
*/

public function pdfKas()
{
    $kas = AsetKeuangan::with([

            'cabang',

            'kas'

        ])
        ->where('jenis', 'kas')
        ->orderBy('id')
        ->get();

    $pdf = Pdf::loadView(

        'keuangan.kas.pdf',

        compact('kas')

    )->setPaper('a4', 'landscape');

    return $pdf->stream(
        'data-kas.pdf'
    );
}
/*
|--------------------------------------------------------------------------
| PDF WAKAF
|--------------------------------------------------------------------------
*/

public function pdfWakaf()
{
    $wakafs = AsetKeuangan::with([

            'cabang',

            'wakaf'

        ])
        ->where('jenis', 'wakaf')
        ->orderBy('id')
        ->get();

    $pdf = Pdf::loadView(

        'keuangan.wakaf.pdf',

        compact('wakafs')

    )->setPaper('a4', 'landscape');

    return $pdf->stream(
        'data-wakaf.pdf'
    );
}
/*
|--------------------------------------------------------------------------
| PDF INFAQ
|--------------------------------------------------------------------------
*/

public function pdfInfaq()
{
    $infaqs = AsetKeuangan::with([

            'cabang',

            'masjid',

            'infaq'

        ])
        ->where('jenis', 'infaq')
        ->orderBy('id')
        ->get();

    $pdf = Pdf::loadView(

        'keuangan.infaq.pdf',

        compact('infaqs')

    )->setPaper('a4', 'landscape');

    return $pdf->stream(
        'data-infaq.pdf'
    );
}
/*
|--------------------------------------------------------------------------
| PDF SEDEKAH
|--------------------------------------------------------------------------
*/

public function pdfSedekah()
{
    $sedekahs = AsetKeuangan::with([

            'cabang',

            'masjid',

            'sedekah'

        ])
        ->where('jenis', 'sedekah')
        ->orderBy('id')
        ->get();

    $pdf = Pdf::loadView(

        'keuangan.sedekah.pdf',

        compact('sedekahs')

    )->setPaper('a4', 'landscape');

    return $pdf->stream(
        'data-sedekah.pdf'
    );
}
/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

public function destroy(string $id)
{
    $aset = AsetKeuangan::findOrFail($id);

    $jenis = $aset->jenis;

    switch ($jenis) {

        case 'kas':

            $aset->kas()->delete();

            break;

        case 'wakaf':

            $aset->wakaf()->delete();

            break;

        case 'infaq':

            $aset->infaq()->delete();

            break;

        case 'sedekah':

            $aset->sedekah()->delete();

            break;
    }

    $aset->delete();

    return redirect()

        ->route('keuangan.' . $jenis)

        ->with(

            'success_delete',

            'Data ' . ucfirst($jenis) . ' berhasil dihapus'

        );
}
}