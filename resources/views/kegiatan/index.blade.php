@extends('layouts.app')
@section('title', 'Program Kerja & Agenda')

@section('content')

<div class="container-fluid py-4">

    <!-- TOP -->
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-4 mb-4">

        <!-- LEFT -->
        <div>

            <!-- SORT -->
            <div class="d-flex align-items-center gap-3 mb-3">

                <label class="filter-label">
                    Urut berdasarkan
                </label>

                <select class="form-select custom-select">

                    <option>terbaru</option>
                    <option>terlama</option>

                </select>

            </div>

            <!-- FILTER CABANG -->
            <div class="d-flex flex-wrap align-items-center cabang-filter mb-3">

                <button class="cabang-filter-btn active">
                    Batam Kota
                </button>

                <button class="cabang-filter-btn">
                    Sekupang
                </button>

                <button class="cabang-filter-btn">
                    Batu Aji
                </button>

                <button class="cabang-filter-btn">
                    Nongsa
                </button>

                <button class="cabang-filter-btn">
                    Sagulung
                </button>

            </div>

            <!-- FILTER RANTING -->
            <div class="d-flex flex-wrap align-items-center gap-4">

                <button class="filter-ranting-line active">
                    Tanjung Riau
                </button>

                <button class="filter-ranting-line">
                    Tiban
                </button>

                <button class="filter-ranting-line">
                    Patam Lestari
                </button>

            </div>

        </div>

        <!-- RIGHT -->
        <div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-end gap-2 mb-3">

                <a href="{{ url('/kegiatan/tambah') }}"
                   class="btn custom-btn-add">

                    <iconify-icon icon="mdi:plus"></iconify-icon>

                    Tambah Data

                </a>

                <button class="btn custom-btn-pdf">

                    <iconify-icon icon="mdi:file-pdf-box"></iconify-icon>

                    Cetak PDF

                </button>

            </div>

            <!-- SEARCH -->
            <div class="d-flex align-items-center gap-2 justify-content-end">

                <label class="search-label">
                    Cari data :
                </label>

                <input type="text"
                       class="form-control custom-search">

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-wrapper">

        <table class="table custom-table align-middle">

            <thead>

                <tr>

                    <th>NO</th>
                    <th>NAMA KEGIATAN</th>
                    <th>JENIS</th>
                    <th>DESKRIPSI</th>
                    <th>TARGET</th>
                    <th>PROGRES (%)</th>
                    <th>TGL MULAI</th>
                    <th>TGL SELESAI</th>
                    <th>LOKASI</th>
                    <th>OPSI</th>

                </tr>

            </thead>

            <tbody>

                @for ($i = 1; $i <= 10; $i++)

                <tr>

                    <td>{{ $i }}</td>

                    <td>
                        Pengajian Rutin
                    </td>

                    <td>

                        @if($i % 2 == 0)

                            program kerja

                        @else

                            agenda

                        @endif

                    </td>

                    <td>
                        Pengajian mingguan
                    </td>

                    <td>
                        Selesai 2025
                    </td>

                    <td>

                        @if($i % 3 == 0)

                            100

                        @elseif($i % 2 == 0)

                            60

                        @else

                            30

                        @endif

                    </td>

                    <td>
                        2025-01-01
                    </td>

                    <td>
                        2025-12-31
                    </td>

                    <td>
                        Masjid Al-Ikhlas
                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <!-- DETAIL -->
                            <button class="btn action-btn btn-detail"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <!-- EDIT -->
                            <button class="btn action-btn btn-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

                            <!-- DELETE -->
                            <button class="btn action-btn btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">

                                <iconify-icon icon="mdi:trash-can"></iconify-icon>

                            </button>

                        </div>

                    </td>

                </tr>

                @endfor

            </tbody>

        </table>

    </div>

    <!-- FOOT -->
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

        <div class="table-info-text">
            Menunjukan 1 sampai 10 dari 10 entri
        </div>

        <div class="custom-pagination">

            <button class="page-btn page-prev">
                Sebelumnya
            </button>

            <button class="page-btn active">
                1
            </button>

            <button class="page-btn page-next">
                Berikutnya
            </button>

        </div>

    </div>

</div>

@include('kegiatan.modals.detail')
@include('kegiatan.modals.edit')
@include('kegiatan.modals.delete')

@endsection