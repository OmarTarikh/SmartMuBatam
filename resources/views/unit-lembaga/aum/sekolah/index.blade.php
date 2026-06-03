@extends('layouts.app')

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

            <!-- FILTER JENIS -->
            <div class="aum-filter d-flex align-items-center">

                    <a href="{{ url('/unit-lembaga/aum/sekolah') }}"
                       class="aum-filter-btn active text-decoration-none d-inline-flex align-items-center">

                        SEKOLAH

                    </a>

                    <a href="{{ url('/unit-lembaga/aum/klinik') }}"
                       class="aum-filter-btn text-decoration-none d-inline-flex align-items-center">

                        Klinik

                    </a>

                    <button class="aum-filter-btn">
                        Lainnya
                    </button>

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

                <a href="{{ url('/unit-lembaga/aum/sekolah/tambah') }}"
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
                    <th>Jml. SISWA</th>
                    <th>Jml. GURU</th>
                    <th>AKREDITASI</th>
                    <th>TAHUN</th>
                    <th>ALAMAT</th>
                    <th>STATUS IZIN</th>
                    <th>OPSI</th>

                </tr>

            </thead>

            <tbody>

                @for($i = 1; $i <= 10; $i++)

                <tr>

                    <td>SD Muhammadiyah {{ $i }}</td>
                    <td>300</td>
                    <td>20</td>
                    <td>A</td>
                    <td>2024</td>
                    <td>Baloi</td>

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

@include('unit-lembaga.aum.sekolah.modals.detail')
@include('unit-lembaga.aum.sekolah.modals.edit')
@include('unit-lembaga.aum.sekolah.modals.delete')

@endsection