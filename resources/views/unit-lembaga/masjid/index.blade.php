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

                    <option>
                        terbaru
                    </option>

                    <option>
                        terlama
                    </option>

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

                <!-- TAMBAH -->
                <a href="{{ url('/unit-lembaga/masjid/tambah') }}"
                   class="btn custom-btn-add d-flex align-items-center gap-2">

                    <iconify-icon icon="mdi:plus" width="20" height="20"></iconify-icon>

                    <span>TAMBAH DATA</span>

                </a>

                <!-- PDF -->
                <button class="btn custom-btn-pdf d-flex align-items-center gap-2">

                    <iconify-icon icon="mdi:file-pdf-box" width="20" height="20"></iconify-icon>

                    <span>CETAK PDF</span>

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

            <!-- HEAD -->
            <thead>

                <tr>

                    <th width="80">NO</th>

                    <th>NAMA MASJID</th>

                    <th>ALAMAT</th>

                    <th>STATUS LEGALITAS</th>

                    <th width="180">OPSI</th>

                </tr>

            </thead>

            <!-- BODY -->
            <tbody>

                @for ($i = 1; $i <= 10; $i++)

                <tr>

                    <td>{{ $i }}</td>

                    <td>Masjid Al-Ikhlas</td>

                    <td>Baloi</td>

                    <td>

                        @if($i % 3 == 1)

                            <span class="status-badge status-active">
                                SERTIFIKAT
                            </span>

                        @elseif($i % 3 == 2)

                            <span class="status-badge status-kurang">
                                PROSES
                            </span>

                        @else

                            <span class="status-badge status-nonaktif">
                                BELUM
                            </span>

                        @endif

                    </td>

                    <!-- OPSI -->
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

        <!-- PAGINATION -->
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

@include('unit-lembaga.masjid.modals.detail')
@include('unit-lembaga.masjid.modals.edit')
@include('unit-lembaga.masjid.modals.delete')

@endsection