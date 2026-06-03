@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <!-- FILTER -->
        <div class="d-flex align-items-center gap-2">

            <label class="filter-label m-0">
                Urut berdasarkan
            </label>

            <select class="form-select custom-select">
                <option>terbaru</option>
                <option>terlama</option>
                <option>aktif</option>
                <option>nonaktif</option>
            </select>

        </div>

        <!-- ACTION -->
        <div class="d-flex align-items-center gap-3 flex-wrap">

            <!-- ADD -->
            <a href="{{ url('organisasi/cabang/tambah') }}"
            class="btn btn-add custom-btn-add d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

                <span>TAMBAH DATA</span>

            </a>
            <!-- PDF -->
            <button class="btn btn-info custom-btn-pdf d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:file-pdf-box" width="18"></iconify-icon>

                <span>CETAK PDF</span>

            </button>

        </div>

    </div>

    <!-- SEARCH -->
    <div class="d-flex justify-content-end mb-3">

        <div class="d-flex align-items-center gap-2">

            <span class="search-label">
                Cari data :
            </span>

            <input type="text" class="form-control custom-search">

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-wrapper">

        <div class="table-responsive">

            <table class="table custom-table align-middle mb-0">

                <!-- HEAD -->
                <thead>

                    <tr>

                        <th width="8%">NO</th>

                        <th width="18%">ID</th>

                        <th>NAMA CABANG</th>

                        <th width="18%">STATUS</th>

                        <th width="18%">OPSI</th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @for ($i = 1; $i <= 10; $i++)

                    <tr>

                        <td>{{ $i }}</td>

                        <td>Table item</td>

                        <td>Table item</td>

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

    </div>

    <!-- FOOTER TABLE -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">

        <!-- INFO -->
        <div class="table-info-text">

            Menunjukan 1 sampai 10 dari 10 entri

        </div>

        <!-- PAGINATION -->
        <div class="custom-pagination d-flex align-items-center">

            <button class="page-btn page-prev">
                Sebelumnya
            </button>

            <button class="page-btn page-number active">
                1
            </button>

            <button class="page-btn page-next">
                Berikutnya
            </button>

        </div>

    </div>

</div>

@endsection

@include('organisasi.cabang.modals.detail')
@include('organisasi.cabang.modals.edit')
@include('organisasi.cabang.modals.delete')