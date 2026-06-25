@extends('layouts.app')

@section('title', 'Manajemen Unit Lembaga > AUM > Sekolah')

@section('content')

<div class="container-fluid py-4">

    <!-- FILTER & ACTION -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-4">

        <!-- LEFT -->
        <div class="d-flex flex-column gap-3">

            <!-- FILTER -->
            <div class="d-flex align-items-center gap-2">

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

                        <option value="aktif"
                            {{ request('filter')=='aktif' ? 'selected' : '' }}>
                            aktif
                        </option>

                        <option value="tidak_aktif"
                            {{ request('filter')=='tidak_aktif' ? 'selected' : '' }}>
                            tidak aktif
                        </option>

                        <option value="proses_izin"
                            {{ request('filter')=='proses_izin' ? 'selected' : '' }}>
                            proses izin
                        </option>

                    </select>

                </form>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex align-items-center gap-3 flex-wrap">

            <!-- ADD -->
            <a href="{{ route('aum.sekolah.tambah') }}"
               class="btn custom-btn-add d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

                <span>TAMBAH DATA</span>

            </a>

            <!-- PDF -->
            <a href="{{ route('aum.sekolah.pdf') }}"
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

                <a href="{{ route('aum.sekolah') }}"
                   class="aum-filter-btn {{ request()->routeIs('aum.sekolah') ? 'active' : '' }}">

                    Sekolah

                </a>

                <a href="{{ route('aum.klinik') }}"
                   class="aum-filter-btn {{ request()->routeIs('aum.klinik') ? 'active' : '' }}">

                    Klinik

                </a>

            </div>

            <!-- FILTER CABANG -->
            <div class="cabang-filter d-flex flex-nowrap mb-4">

                <a href="{{ route('aum.sekolah') }}"
                   class="cabang-filter-btn {{ request('cabang') == null ? 'active' : '' }}">

                    Semua

                </a>

                @foreach($cabangs as $cabang)

                    <a
                        href="{{ route('aum.sekolah',[
                            'cabang'=>$cabang->id,
                            'filter'=>request('filter'),
                            'search'=>request('search')
                        ]) }}"
                        class="cabang-filter-btn
                        {{ request('cabang')==$cabang->id ? 'active' : '' }}">

                        {{ $cabang->nama_cabang }}

                    </a>

                @endforeach

            </div>

            <!-- FILTER RANTING -->
            @if(request('cabang'))

            <div class="d-flex flex-wrap align-items-center gap-3 mb-3">

                <a
                    href="{{ route('aum.sekolah',[
                        'cabang'=>request('cabang'),
                        'filter'=>request('filter'),
                        'search'=>request('search')
                    ]) }}"
                    class="filter-ranting-line
                    {{ request('ranting') == null ? 'active' : '' }}">

                    Semua

                </a>

                @foreach($rantings as $ranting)

                    <a
                        href="{{ route('aum.sekolah',[
                            'cabang'=>request('cabang'),
                            'ranting'=>$ranting->id,
                            'filter'=>request('filter'),
                            'search'=>request('search')
                        ]) }}"
                        class="filter-ranting-line
                        {{ request('ranting')==$ranting->id ? 'active' : '' }}">

                        {{ $ranting->nama_ranting }}

                    </a>

                @endforeach

            </div>

            @endif

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

                <th>NAMA AUM</th>

                <th width="10%">JML. SISWA</th>

                <th width="10%">JML. GURU</th>

                <th width="10%">AKREDITASI</th>

                <th width="10%">TAHUN</th>

                <th>ALAMAT</th>

                <th width="15%">STATUS IZIN</th>

                <th width="12%">OPSI</th>

            </tr>

        </thead>

        <tbody>

            @forelse($aums as $aum)

            <tr>

                <td>

                    {{ $aum->nama_aum }}

                </td>

                <td>

                    {{ $aum->jumlah_siswa ?? '-' }}

                </td>

                <td>

                    {{ $aum->jumlah_guru ?? '-' }}

                </td>

                <td>

                    {{ $aum->akreditasi ?? '-' }}

                </td>

                <td>

                    {{ $aum->tahun ?? '-' }}

                </td>

                <td>

                    {{ $aum->alamat }}

                </td>

                    <td>

                        @if($aum->status_perizinan == 'aktif')

                            <span class="status-badge status-active">
                                AKTIF
                            </span>

                        @elseif($aum->status_perizinan == 'tidak aktif')

                            <span class="status-badge status-nonaktif">
                                TIDAK AKTIF
                            </span>

                        @else

                            <span class="status-badge status-kurang">
                                PROSES IZIN
                            </span>

                        @endif

                    </td>

                </td>

                <td>

                    <div class="d-flex justify-content-center gap-2">

                        <!-- DETAIL -->
                        <button
                            class="action-btn btn-detail"
                            data-bs-toggle="modal"
                            data-bs-target="#detailModal{{ $aum->id }}">

                            <iconify-icon icon="mdi:eye"></iconify-icon>

                        </button>

                        <!-- EDIT -->
                        <button
                            class="action-btn btn-edit"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $aum->id }}">

                            <iconify-icon icon="mdi:pencil"></iconify-icon>

                        </button>

                        <!-- DELETE -->
                        <button
                            class="action-btn btn-delete"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $aum->id }}">

                            <iconify-icon icon="mdi:trash-can"></iconify-icon>

                        </button>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="8" class="text-center py-4">

                    Tidak ada data sekolah

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

            {{ $aums->firstItem() ?? 0 }}

            sampai

            {{ $aums->lastItem() ?? 0 }}

            dari

            {{ $aums->total() }}

            entri

        </div>

        <!-- PAGINATION -->
        <div class="custom-pagination d-flex align-items-center">

            {{-- Sebelumnya --}}
            @if ($aums->onFirstPage())

                <button class="page-btn page-prev" disabled>

                    Sebelumnya

                </button>

            @else

                <a
                    href="{{ $aums->previousPageUrl() }}"
                    class="page-btn page-prev">

                    Sebelumnya

                </a>

            @endif

            @php

                $start = max($aums->currentPage() - 2, 1);

                $end = min($start + 4, $aums->lastPage());

                if (($end - $start) < 4) {

                    $start = max($end - 4, 1);

                }

            @endphp

            @for($page = $start; $page <= $end; $page++)

                <a
                    href="{{ $aums->url($page) }}"
                    class="page-btn {{ $page == $aums->currentPage() ? 'active' : '' }}">

                    {{ $page }}

                </a>

            @endfor

            {{-- Berikutnya --}}
            @if($aums->hasMorePages())

                <a
                    href="{{ $aums->nextPageUrl() }}"
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

@include('unit-lembaga.aum.sekolah.modals.detail')
@include('unit-lembaga.aum.sekolah.modals.edit')
@include('unit-lembaga.aum.sekolah.modals.delete')

@endsection