@extends('layouts.app')
@section('title', 'Aset Keuangan > Infaq')

@section('content')

<div class="container-fluid py-4">

    <!-- FILTER & ACTION -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-4">

        <!-- LEFT -->
        <div class="d-flex flex-column gap-3">

            <!-- FILTER -->
            <div class="d-flex align-items-center gap-2">

                <form method="GET" class="d-flex align-items-center gap-2">

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

                        <option value="terbaru"
                            {{ request('filter') == 'terbaru' ? 'selected' : '' }}>

                            Terbaru

                        </option>

                        <option value="terlama"
                            {{ request('filter') == 'terlama' ? 'selected' : '' }}>

                            Terlama

                        </option>

                        <option value="masuk"
                            {{ request('filter') == 'masuk' ? 'selected' : '' }}>

                            Kas Masuk

                        </option>

                        <option value="keluar"
                            {{ request('filter') == 'keluar' ? 'selected' : '' }}>

                            Kas Keluar

                        </option>

                    </select>

                </form>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex align-items-center gap-3 flex-wrap">

            <!-- ADD -->
            <a href="{{ route('keuangan.infaq.tambah') }}"
               class="btn custom-btn-add d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

                <span>TAMBAH DATA</span>

            </a>

            <!-- PDF -->
            <a href="{{ route('keuangan.infaq.pdf') }}"
               target="_blank"
               class="btn custom-btn-pdf d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:file-pdf-box" width="18"></iconify-icon>

                <span>CETAK PDF</span>

            </a>

        </div>

    </div>

    <!-- FILTER JENIS + CABANG + SEARCH -->
    <div class="d-flex align-items-start justify-content-between gap-4 mb-3">

        <div>

            <!-- FILTER JENIS -->
            <div class="aum-filter d-flex flex-nowrap mb-4">

                <a href="{{ route('keuangan.kas') }}"
                   class="aum-filter-btn {{ request()->routeIs('keuangan.kas') ? 'active' : '' }}">

                    Kas

                </a>

                <a href="{{ route('keuangan.wakaf') }}"
                   class="aum-filter-btn {{ request()->routeIs('keuangan.wakaf') ? 'active' : '' }}">

                    Wakaf

                </a>

                <a href="{{ route('keuangan.infaq') }}"
                   class="aum-filter-btn {{ request()->routeIs('keuangan.infaq') ? 'active' : '' }}">

                    Infaq

                </a>

                <a href="{{ route('keuangan.sedekah') }}"
                   class="aum-filter-btn {{ request()->routeIs('keuangan.sedekah') ? 'active' : '' }}">

                    Sedekah

                </a>

            </div>

            <!-- FILTER CABANG -->
            <div class="cabang-filter d-flex flex-nowrap mb-4">

                <a href="{{ route('keuangan.kas',[
                        'filter'=>request('filter'),
                        'search'=>request('search')
                    ]) }}"
                   class="cabang-filter-btn {{ request('cabang') == null ? 'active' : '' }}">

                    Semua

                </a>

                @foreach($cabangs as $cabang)

                    <a
                        href="{{ route('keuangan.kas',[
                            'cabang'=>$cabang->id,
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
                    name="cabang"
                    value="{{ request('cabang') }}">

                <input
                    type="hidden"
                    name="ranting"
                    value="{{ request('ranting') }}">

                <span class="search-label text-nowrap">

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

                    <th style="width:18%">CABANG</th>

                    <th style="width:18%">MASJID</th>

                    <th class="text-end" style="width:18%">

                        JUMLAH

                    </th>

                    <th style="width:22%">

                        KETERANGAN

                    </th>

                    <th class="text-center" style="width:12%">

                        TANGGAL

                    </th>

                    <th class="text-center" style="width:120px">

                        OPSI

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($infaqs as $item)

                <tr>

                    <td>

                        <div class="fw-semibold">

                            {{ $item->cabang->nama_cabang ?? '-' }}

                        </div>

                    </td>

                    <td>

                        {{ $item->masjid->nama_masjid ?? '-' }}

                    </td>

                    <td class="text-end">

                        Rp {{ number_format(optional($item->infaq)->jumlah ?? 0,0,',','.') }}

                    </td>

                    <td>

                        {{ optional($item->infaq)->keterangan ?? '-' }}

                    </td>

                    <td class="text-center">

                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <button
                                class="action-btn btn-detail"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $item->id }}">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <button
                                class="action-btn btn-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $item->id }}">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

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

                    <td colspan="6" class="text-center py-5 text-muted">

                        Belum ada data infaq.

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

            {{ $infaqs->firstItem() ?? 0 }}

            sampai

            {{ $infaqs->lastItem() ?? 0 }}

            dari

            {{ $infaqs->total() }}

            entri

        </div>

        <!-- PAGINATION -->
        <div class="custom-pagination d-flex align-items-center">

            {{-- Sebelumnya --}}
            @if ($infaqs->onFirstPage())

                <button class="page-btn page-prev" disabled>

                    Sebelumnya

                </button>

            @else

                <a
                    href="{{ $infaqs->previousPageUrl() }}"
                    class="page-btn page-prev">

                    Sebelumnya

                </a>

            @endif

            @php

                $start = max($infaqs->currentPage() - 2, 1);

                $end = min($start + 4, $infaqs->lastPage());

                if (($end - $start) < 4) {

                    $start = max($end - 4, 1);

                }

            @endphp

            @for($page = $start; $page <= $end; $page++)

                <a
                    href="{{ $infaqs->url($page) }}"
                    class="page-btn {{ $page == $infaqs->currentPage() ? 'active' : '' }}">

                    {{ $page }}

                </a>

            @endfor

            {{-- Berikutnya --}}
            @if($infaqs->hasMorePages())

                <a
                    href="{{ $infaqs->nextPageUrl() }}"
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

@include('keuangan.infaq.modals.detail')
@include('keuangan.infaq.modals.edit')
@include('keuangan.infaq.modals.delete')

@endsection