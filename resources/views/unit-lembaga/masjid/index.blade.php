@extends('layouts.app')

@section('title', 'Manajemen Unit Lembaga > Masjid')

@section('content')

<div class="container-fluid py-4">

<!-- ========================================
     FILTER & ACTION
======================================== -->
<div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-4">

    <!-- LEFT -->
    <div class="d-flex flex-column gap-3">

        <form method="GET" class="d-flex align-items-center gap-2">

            <label class="filter-label m-0">
                Urut berdasarkan
            </label>

            <select
                name="filter"
                class="form-select custom-select"
                onchange="this.form.submit()">

                <option value="terbaru"
                    {{ request('filter')=='terbaru' ? 'selected' : '' }}>
                    terbaru
                </option>

                <option value="terlama"
                    {{ request('filter')=='terlama' ? 'selected' : '' }}>
                    terlama
                </option>

                <option value="sertifikat"
                    {{ request('filter')=='sertifikat' ? 'selected' : '' }}>
                    sertifikat
                </option>

                <option value="proses"
                    {{ request('filter')=='proses' ? 'selected' : '' }}>
                    proses
                </option>

                <option value="belum"
                    {{ request('filter')=='belum' ? 'selected' : '' }}>
                    belum
                </option>

            </select>

        </form>

    </div>

    <!-- RIGHT -->
    <div class="d-flex align-items-center gap-3 flex-wrap">

        <a
            href="{{ route('masjid.create') }}"
            class="btn custom-btn-add d-flex align-items-center gap-2">

            <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

            <span>TAMBAH DATA</span>

        </a>

        <a
            href="{{ route('masjid.pdf') }}"
            target="_blank"
            class="btn custom-btn-pdf d-flex align-items-center gap-2">

            <iconify-icon icon="mdi:file-pdf-box" width="18"></iconify-icon>

            <span>CETAK PDF</span>

        </a>

    </div>

</div>


<!-- ========================================
     FILTER CABANG & SEARCH
======================================== -->
<div class="d-flex align-items-start justify-content-between gap-4 mb-3">

    <!-- LEFT -->
    <div>

        <!-- CABANG -->
        <div class="cabang-filter d-flex flex-nowrap mb-4">

            <a
                href="{{ route('masjid.index') }}"
                class="cabang-filter-btn {{ request('cabang')==null ? 'active' : '' }}">

                Semua

            </a>

            @foreach($cabangs as $cabang)

                <a
                    href="{{ route('masjid.index',[
                        'cabang'=>$cabang->id,
                        'filter'=>request('filter'),
                        'search'=>request('search')
                    ]) }}"
                    class="cabang-filter-btn {{ request('cabang')==$cabang->id ? 'active' : '' }}">

                    {{ $cabang->nama_cabang }}

                </a>

            @endforeach

        </div>

        <!-- RANTING -->
        @if(request('cabang'))

        <div class="d-flex flex-wrap align-items-center gap-3 mb-3">

            <a
                href="{{ route('masjid.index',[
                    'cabang'=>request('cabang'),
                    'filter'=>request('filter'),
                    'search'=>request('search')
                ]) }}"
                class="filter-ranting-line {{ request('ranting')==null ? 'active' : '' }}">

                Semua

            </a>

            @foreach($rantings as $ranting)

                <a
                    href="{{ route('masjid.index',[
                        'cabang'=>request('cabang'),
                        'ranting'=>$ranting->id,
                        'filter'=>request('filter'),
                        'search'=>request('search')
                    ]) }}"
                    class="filter-ranting-line {{ request('ranting')==$ranting->id ? 'active' : '' }}">

                    {{ $ranting->nama_ranting }}

                </a>

            @endforeach

        </div>

        @endif

    </div>

    <!-- RIGHT -->
    <div class="d-flex justify-content-end mb-3">

        <form
            method="GET"
            id="searchForm"
            class="d-flex align-items-center gap-2">

            <input
                type="hidden"
                name="filter"
                value="{{ request('filter') }}">

            <input
                type="hidden"
                name="cabang"
                value="{{ request('cabang') }}">

            <input
                type="hidden"
                name="ranting"
                value="{{ request('ranting') }}">

            <span class="search-label">
                Cari data :
            </span>

            <input
                id="searchInput"
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control custom-search"
                placeholder="Cari...">

        </form>

    </div>

</div>
        <!-- ========================================
         TABLE
    ========================================= -->
    <div class="table-wrapper">

        <div class="table-responsive">

            <table class="table custom-table align-middle mb-0">

                <thead>

                    <tr>

                        <th width="8%">
                            NO
                        </th>

                        <th>
                            NAMA MASJID
                        </th>

                        <th width="18%">
                            CABANG
                        </th>

                        <th width="18%">
                            RANTING
                        </th>

                        <th>
                            ALAMAT
                        </th>

                        <th width="18%">
                            STATUS LEGALITAS
                        </th>

                        <th width="18%">
                            OPSI
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($masjids as $masjid)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $masjid->nama_masjid }}

                        </td>

                        <td>

                            {{ $masjid->ranting->cabang->nama_cabang ?? '-' }}

                        </td>

                        <td>

                            {{ $masjid->ranting->nama_ranting ?? '-' }}

                        </td>

                        <td>

                            {{ $masjid->alamat }}

                        </td>

                        <td>

                            @if($masjid->status_legalitas == 'sertifikat')

                                <span class="status-badge status-active">

                                    SERTIFIKAT

                                </span>

                            @elseif($masjid->status_legalitas == 'proses')

                                <span class="status-badge status-kurang">

                                    PROSES

                                </span>

                            @else

                                <span class="status-badge status-nonaktif">

                                    BELUM

                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <!-- DETAIL -->
                                <button
                                    class="action-btn btn-detail"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $masjid->id }}">

                                    <iconify-icon
                                        icon="mdi:eye">
                                    </iconify-icon>

                                </button>

                                <!-- EDIT -->
                                <button
                                    class="action-btn btn-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $masjid->id }}">

                                    <iconify-icon
                                        icon="mdi:pencil">
                                    </iconify-icon>

                                </button>

                                <!-- DELETE -->
                                <button
                                    class="action-btn btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $masjid->id }}">

                                    <iconify-icon
                                        icon="mdi:trash-can">
                                    </iconify-icon>

                                </button>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center py-4">

                            Tidak ada data masjid

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <!-- ========================================
         PAGINATION
    ========================================= -->
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

        <div class="table-info-text">

            Menunjukan

            {{ $masjids->firstItem() ?? 0 }}

            sampai

            {{ $masjids->lastItem() ?? 0 }}

            dari

            {{ $masjids->total() }}

            entri

        </div>

        <div class="custom-pagination d-flex align-items-center">

            {{-- Previous --}}
            @if($masjids->onFirstPage())

                <button
                    class="page-btn page-prev"
                    disabled>

                    Sebelumnya

                </button>

            @else

                <a
                    href="{{ $masjids->previousPageUrl() }}"
                    class="page-btn page-prev">

                    Sebelumnya

                </a>

            @endif


            {{-- Number --}}
            @php

                $start = max(
                    $masjids->currentPage()-2,
                    1
                );

                $end = min(
                    $start+4,
                    $masjids->lastPage()
                );

                if(($end-$start)<4){

                    $start=max(
                        $end-4,
                        1
                    );

                }

            @endphp

            @for($page=$start;$page<=$end;$page++)

                <a
                    href="{{ $masjids->url($page) }}"
                    class="page-btn {{ $page==$masjids->currentPage() ? 'active' : '' }}">

                    {{ $page }}

                </a>

            @endfor


            {{-- Next --}}
            @if($masjids->hasMorePages())

                <a
                    href="{{ $masjids->nextPageUrl() }}"
                    class="page-btn page-next">

                    Berikutnya

                </a>

            @else

                <button
                    class="page-btn page-next"
                    disabled>

                    Berikutnya

                </button>

            @endif

        </div>

    </div>

</div>

@push('scripts')

<script>

let timer;

document
    .getElementById('searchInput')
    .addEventListener('input', function () {

        clearTimeout(timer);

        timer = setTimeout(() => {

            document
                .getElementById('searchForm')
                .submit();

        },500);

    });

</script>

@endpush

@endsection


@include('unit-lembaga.masjid.modals.detail')

@include('unit-lembaga.masjid.modals.edit')

@include('unit-lembaga.masjid.modals.delete')