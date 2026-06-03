@extends('layouts.app')

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

                <a href="{{ url('/keuangan/tambah') }}"
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
                    <th>JENIS</th>
                    <th>JUMLAH</th>
                    <th>KETERANGAN</th>
                    <th>LOKASI</th>
                    <th>TANGGAL</th>
                    <th>OPSI</th>

                </tr>

            </thead>

            <tbody>

                @for ($i = 1; $i <= 10; $i++)

                <tr>

                    <td>{{ $i }}</td>

                    <td>
                        @if($i % 2 == 0)
                            kas_keluar
                        @else
                            kas_masuk
                        @endif
                    </td>

                    <td>
                        Rp 5.000.000
                    </td>

                    <td>
                        Donasi Jumat
                    </td>

                    <td>
                        Baloi
                    </td>

                    <td>
                        2025-01-10
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

@include('keuangan.modals.detail')
@include('keuangan.modals.edit')
@include('keuangan.modals.delete')

@endsection