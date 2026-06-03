{{-- ========================================
     resources/views/organisasi/anggota/index.blade.php
======================================== --}}

@extends('layouts.app')

@section('content')

<div class="container-fluid py-4 anggota-page">

    <!-- ========================================
         TOP ACTION
    ======================================== -->
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">

        <!-- LEFT -->
        <div class="d-flex flex-column gap-3">

            <!-- SORT -->
            <div class="d-flex align-items-center gap-3">

                <label class="filter-label">
                    Urut berdasarkan
                </label>

                <select class="form-select custom-select">

                    <option>
                        terbaru
                    </option>

                    <option>
                        terlama
                    </option>

                    <option>
                        aktif
                    </option>

                    <option>
                        nonaktif
                    </option>

                </select>

            </div>

            <!-- FILTER CABANG -->
            <div class="d-flex flex-wrap align-items-center cabang-filter">

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

                <button class="cabang-filter-btn">
                    Batu Ampar
                </button>

                <button class="cabang-filter-btn">
                    Lubuk Baja
                </button>

            </div>

            <!-- FILTER RANTING -->
            <div class="d-flex flex-wrap align-items-center gap-3">

                <button class="filter-ranting-line active">
                    Tanjung Riau
                </button>

                <button class="filter-ranting-line">
                    Tiban
                </button>

                <button class="filter-ranting-line">
                    Patam Lestari
                </button>

                <button class="filter-ranting-line">
                    Batu Selicin
                </button>

                <button class="filter-ranting-line">
                    Baloi
                </button>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex flex-column align-items-end gap-3">

            <!-- BUTTON -->
            <div class="d-flex gap-3">

                <a href="{{ url('/organisasi/anggota/tambah') }}"
                   class="btn custom-btn-add d-flex align-items-center gap-2">

                    <iconify-icon icon="mdi:plus" width="20" height="20"></iconify-icon>

                    TAMBAH DATA

                </a>

                <button class="btn custom-btn-pdf d-flex align-items-center gap-2">

                    <iconify-icon icon="mdi:file-pdf-box" width="18" height="18"></iconify-icon>

                    CETAK PDF

                </button>

            </div>

            <!-- SEARCH -->
            <div class="d-flex align-items-center gap-2">

                <label class="search-label">
                    Cari data :
                </label>

                <input type="text"
                       class="form-control custom-search">

            </div>

        </div>

    </div>

    <!-- ========================================
         TABLE
    ======================================== -->
    <div class="table-wrapper">

        <table class="table custom-table align-middle">

            <thead>

                <tr>

                    <th>NIK</th>

                    <th>NAMA</th>

                    <th>KELAMIN</th>

                    <th>TGL. LAHIR</th>

                    <th>ALAMAT</th>

                    <th>PEKERJAAN</th>

                    <th>PENDIDIKAN</th>

                    <th>STATUS</th>

                    <th>OPSI</th>

                </tr>

            </thead>

            <tbody>

                @for($i = 1; $i <= 10; $i++)

                <tr>

                    <td>100{{ $i }}</td>

                    <td>Table item</td>

                    <td>L</td>

                    <td>1999-01-01</td>

                    <td>Batam Kota</td>

                    <td>Karyawan</td>

                    <td>S1</td>

                    <td>

                        @if($i % 3 == 1)

                            <span class="status-badge status-active">
                                AKTIF
                            </span>

                        @elseif($i % 3 == 2)

                            <span class="status-badge status-nonaktif">
                                NONAKTIF
                            </span>

                        @else

                            <span class="status-badge status-kurang">
                                KURANG AKTIF
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <!-- DETAIL -->
                            <button class="action-btn btn-detail"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <!-- EDIT -->
                            <button class="action-btn btn-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

                            <!-- DELETE -->
                            <button class="action-btn btn-delete"
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

    <!-- PAGINATION -->
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

@include('organisasi.anggota.modals.detail')
@include('organisasi.anggota.modals.edit')
@include('organisasi.anggota.modals.delete')

@endsection