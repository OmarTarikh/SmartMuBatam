@extends('layouts.app')

@section('title', 'Manajemen Unit Lembaga > AUM > Klinik')

@section('content')

<div class="container-fluid py-4">

    <!-- TOP ACTION -->
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">

        <!-- LEFT -->
        <div class="d-flex flex-column gap-3">

            <!-- SORT -->
            <div class="d-flex align-items-center gap-3">

                <label class="filter-label">
                    Urut berdasarkan
                </label>

                <select class="form-select custom-select">
                    <option>terbaru</option>
                    <option>terlama</option>
                </select>

            </div>

            <!-- FILTER JENIS AUM -->
            <div class="aum-filter d-flex align-items-center">

                <!-- SEKOLAH -->
                <a href="{{ url('/unit-lembaga/aum/sekolah') }}"
                class="aum-filter-btn">

                    Sekolah

                </a>

                <!-- KLINIK ACTIVE -->
                <a href="{{ url('/unit-lembaga/aum/klinik') }}"
                class="aum-filter-btn active">

                    KLINIK

                </a>

                <!-- LAINNYA -->
                <a href="#"
                class="aum-filter-btn">

                    Lainnya

                </a>

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

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex flex-column align-items-end gap-3">

            <div class="d-flex gap-3">

                <a href="{{ url('/unit-lembaga/aum/klinik/tambah') }}"
                   class="btn custom-btn-add d-flex align-items-center gap-2">

                    <iconify-icon icon="mdi:plus" width="20" height="20"></iconify-icon>

                    TAMBAH DATA

                </a>

                <button class="btn custom-btn-pdf d-flex align-items-center gap-2">

                    <iconify-icon icon="mdi:file-pdf-box" width="20" height="20"></iconify-icon>

                    CETAK PDF

                </button>

            </div>

            <div class="d-flex align-items-center gap-2">

                <label class="search-label">
                    Cari data :
                </label>

                <input type="text" class="form-control custom-search">

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-wrapper">

        <table class="table custom-table align-middle">

            <thead>

                <tr>

                    <th>NAMA AUM</th>
                    <th>Jml. PASIEN</th>
                    <th>Jml. DOKTER</th>
                    <th>KAPASITAS</th>
                    <th>TAHUN</th>
                    <th>ALAMAT</th>
                    <th>STATUS IZIN</th>
                    <th>OPSI</th>

                </tr>

            </thead>

            <tbody>

                @for($i = 1; $i <= 10; $i++)

                <tr>

                    <td>Klinik Muhammadiyah {{ $i }}</td>
                    <td>120</td>
                    <td>8</td>
                    <td>50</td>
                    <td>2024</td>
                    <td>Tiban</td>

                    <td>

                        @if($i % 3 == 1)

                            <span class="status-badge status-active">
                                AKTIF
                            </span>

                        @elseif($i % 3 == 2)

                            <span class="status-badge status-nonaktif">
                                TIDAK AKTIF
                            </span>

                        @else

                            <span class="status-badge status-kurang">
                                PROSES IZIN
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <button class="action-btn btn-detail"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <button class="action-btn btn-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

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
    <div class="d-flex justify-content-between align-items-center mt-4">

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

@include('unit-lembaga.aum.klinik.modals.detail')
@include('unit-lembaga.aum.klinik.modals.edit')
@include('unit-lembaga.aum.klinik.modals.delete')

@endsection