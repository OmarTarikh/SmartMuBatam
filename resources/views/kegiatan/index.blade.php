@extends('layouts.app')
@section('title', 'Program Kerja & Agenda')

@section('content')


<div class="container-fluid py-4">

    <!-- FILTER & ACTION -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-4">

        <!-- LEFT -->
        <div class="d-flex flex-column gap-3">

            <!-- FILTER -->
            <div class="d-flex align-items-center gap-2">

                <form
                    method="GET"
                    class="d-flex align-items-center gap-2">

                    <input
                        type="hidden"
                        name="jenis"
                        value="{{ request('jenis') }}">

                    <input
                        type="hidden"
                        name="cabang"
                        value="{{ request('cabang') }}">

                    <input
                        type="hidden"
                        name="search"
                        value="{{ request('search') }}">

                    <label class="filter-label m-0">

                        Urut berdasarkan

                    </label>

                    <select
                        name="filter"
                        class="form-select custom-select"
                        onchange="this.form.submit()">

                        <option
                            value="terbaru"
                            {{ request('filter')=='terbaru' || request('filter')==null ? 'selected' : '' }}>

                            Terbaru

                        </option>

                        <option
                            value="terlama"
                            {{ request('filter')=='terlama' ? 'selected' : '' }}>

                            Terlama

                        </option>

                    </select>

                </form>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex align-items-center gap-3 flex-wrap">

            <!-- ADD -->
            <a
                href="{{ route('kegiatan.tambah') }}"
                class="btn custom-btn-add d-flex align-items-center gap-2">

                <iconify-icon
                    icon="mdi:plus"
                    width="20">
                </iconify-icon>

                <span>

                    TAMBAH DATA

                </span>

            </a>

            <!-- PDF -->
            <a
                href="{{ route('kegiatan.pdf', request()->query()) }}"
                target="_blank"
                class="btn custom-btn-pdf d-flex align-items-center gap-2">

                <iconify-icon
                    icon="mdi:file-pdf-box"
                    width="18">
                </iconify-icon>

                <span>

                    CETAK PDF

                </span>

            </a>

        </div>

    </div>

    <!-- FILTER JENIS + CABANG + SEARCH -->
    <div class="d-flex align-items-start justify-content-between gap-4 mb-3">

        <div>

            <!-- FILTER JENIS -->
            <div class="aum-filter d-flex flex-nowrap mb-4">

                <a
                    href="{{ route('kegiatan',[
                        'filter'=>request('filter'),
                        'cabang'=>request('cabang'),
                        'search'=>request('search')
                    ]) }}"
                    class="aum-filter-btn {{ request('jenis') == null ? 'active' : '' }}">

                    Semua

                </a>

                <a
                    href="{{ route('kegiatan',[
                        'jenis'=>'agenda',
                        'filter'=>request('filter'),
                        'cabang'=>request('cabang'),
                        'search'=>request('search')
                    ]) }}"
                    class="aum-filter-btn {{ request('jenis')=='agenda' ? 'active' : '' }}">

                    Agenda

                </a>

                <a
                    href="{{ route('kegiatan',[
                        'jenis'=>'program_kerja',
                        'filter'=>request('filter'),
                        'cabang'=>request('cabang'),
                        'search'=>request('search')
                    ]) }}"
                    class="aum-filter-btn {{ request('jenis')=='program_kerja' ? 'active' : '' }}">

                    Program Kerja

                </a>

            </div>

            <!-- FILTER CABANG -->
            <div class="cabang-filter d-flex flex-nowrap mb-4">

                <a
                    href="{{ route('kegiatan',[
                        'jenis'=>request('jenis'),
                        'filter'=>request('filter'),
                        'search'=>request('search')
                    ]) }}"
                    class="cabang-filter-btn {{ request('cabang') == null ? 'active' : '' }}">

                    Semua

                </a>

                @foreach($cabangs as $cabang)

                    <a
                        href="{{ route('kegiatan',[
                            'cabang'=>$cabang->id,
                            'jenis'=>request('jenis'),
                            'filter'=>request('filter'),
                            'search'=>request('search')
                        ]) }}"
                        class="cabang-filter-btn {{ request('cabang')==$cabang->id ? 'active' : '' }}">

                        {{ $cabang->nama_cabang }}

                    </a>

                @endforeach

            </div>

        </div>

        <!-- SEARCH -->
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
                    name="jenis"
                    value="{{ request('jenis') }}">

                <input
                    type="hidden"
                    name="cabang"
                    value="{{ request('cabang') }}">

                <span class="search-label">

                    Cari data :

                </span>

                <input
                    type="text"
                    id="searchInput"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control custom-search"
                    placeholder="Cari...">

            </form>

        </div>

    </div>    

    <!-- TABLE -->
    <div class="table-wrapper">

        <table class="table custom-table align-middle">

            <thead>

                <tr>

                    <th style="width:18%">

                        NAMA KEGIATAN

                    </th>

                    <th style="width:14%">

                        CABANG

                    </th>

                    <th class="text-center" style="width:10%">

                        JENIS

                    </th>

                    <th style="width:18%">

                        TARGET

                    </th>

                    <th class="text-center" style="width:8%">

                        PROGRES

                    </th>

                    <th class="text-center" style="width:10%">

                        MULAI

                    </th>

                    <th class="text-center" style="width:10%">

                        SELESAI

                    </th>

                    <th style="width:12%">

                        LOKASI

                    </th>

                    <th class="text-center" style="width:120px">

                        OPSI

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($kegiatans as $item)

                <tr>

                    <!-- NAMA -->
                    <td>

                        <div class="fw-semibold">

                            {{ $item->nama_kegiatan }}

                        </div>

                        <small class="text-muted">

                            {{ Str::limit($item->deskripsi,100) }}

                        </small>

                    </td>

                    <!-- CABANG -->
                    <td>

                        {{ $item->cabang->nama_cabang ?? '-' }}

                    </td>

                    <!-- JENIS -->
                    <td class="text-center">

                        @if($item->jenis == 'agenda')

                            <span class="status-badge status-active">

                                AGENDA

                            </span>

                        @else

                            <span class="status-badge status-kurang">

                                PROGRAM

                            </span>

                        @endif

                    </td>

                    <!-- TARGET -->
                    <td>

                        {{ $item->target }}

                    </td>

                    <!-- PROGRES -->
                    <td class="text-center">

                        @if($item->progres_persen >= 100)

                            <span class="status-badge status-active">

                                {{ $item->progres_persen }}%

                            </span>

                        @elseif($item->progres_persen >= 50)

                            <span class="status-badge status-kurang">

                                {{ $item->progres_persen }}%

                            </span>

                        @else

                            <span class="status-badge status-nonaktif">

                                {{ $item->progres_persen }}%

                            </span>

                        @endif

                    </td>

                    <!-- MULAI -->
                    <td class="text-center">

                        {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}

                    </td>

                    <!-- SELESAI -->
                    <td class="text-center">

                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}

                    </td>

                    <!-- LOKASI -->
                    <td>

                        {{ $item->lokasi }}

                    </td>

                    <!-- OPSI -->
                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <!-- DETAIL -->
                            <button
                                class="action-btn btn-detail"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $item->id }}">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <!-- EDIT -->
                            <button
                                class="action-btn btn-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->id }}">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

                            <!-- DELETE -->
                            <button
                                class="action-btn btn-delete"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $item->id }}">

                                <iconify-icon icon="mdi:trash-can"></iconify-icon>

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9" class="text-center py-5 text-muted">

                        Belum ada data kegiatan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

        <!-- INFO -->
        <div class="table-info-text">

            Menunjukan

            {{ $kegiatans->firstItem() ?? 0 }}

            sampai

            {{ $kegiatans->lastItem() ?? 0 }}

            dari

            {{ $kegiatans->total() }}

            entri

        </div>

        <!-- PAGINATION -->
        <div class="custom-pagination d-flex align-items-center">

            {{-- Sebelumnya --}}
            @if ($kegiatans->onFirstPage())

                <button class="page-btn page-prev" disabled>

                    Sebelumnya

                </button>

            @else

                <a
                    href="{{ $kegiatans->previousPageUrl() }}"
                    class="page-btn page-prev">

                    Sebelumnya

                </a>

            @endif

            @php

                $start = max($kegiatans->currentPage() - 2, 1);

                $end = min($start + 4, $kegiatans->lastPage());

                if (($end - $start) < 4) {

                    $start = max($end - 4, 1);

                }

            @endphp

            @for($page = $start; $page <= $end; $page++)

                <a
                    href="{{ $kegiatans->url($page) }}"
                    class="page-btn {{ $page == $kegiatans->currentPage() ? 'active' : '' }}">

                    {{ $page }}

                </a>

            @endfor

            {{-- Berikutnya --}}
            @if($kegiatans->hasMorePages())

                <a
                    href="{{ $kegiatans->nextPageUrl() }}"
                    class="page-btn page-next">

                    Berikutnya

                </a>

            @else

                <button class="page-btn page-next" disabled>

                    Berikutnya

                </button>

            @endif

        </div>

    </div>
</div>

@push('scripts')

<script>

let timer;

document.getElementById('searchInput').addEventListener('input', function () {

    clearTimeout(timer);

    timer = setTimeout(() => {

        document.getElementById('searchForm').submit();

    }, 500);

});

</script>

@endpush

@include('kegiatan.modals.detail')
@include('kegiatan.modals.edit')
@include('kegiatan.modals.delete')

@endsection