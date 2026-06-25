{{-- ========================================
     resources/views/organisasi/anggota/index.blade.php
======================================== --}}

@extends('layouts.app')

@section('title', 'Manajemen Organisasi > Anggota')

@section('content')

<div class="container-fluid py-4 anggota-page">

    <!-- ========================================
         TOP ACTION
    ======================================== -->
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

                        <option value="AKTIF"
                            {{ request('filter')=='AKTIF' ? 'selected' : '' }}>
                            aktif
                        </option>

                        <option value="VAKUM"
                            {{ request('filter')=='VAKUM' ? 'selected' : '' }}>
                            vakum
                        </option>

                        <option value="KURANG AKTIF"
                            {{ request('filter')=='KURANG AKTIF' ? 'selected' : '' }}>
                            kurang aktif
                        </option>

                    </select>

                </form>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex align-items-center gap-3 flex-wrap">

            <!-- ADD -->
            <a href="{{ route('anggota.create') }}"
            class="btn custom-btn-add d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

                <span>TAMBAH DATA</span>

            </a>

            <!-- PDF -->
            <a href="{{ route('anggota.pdf') }}"
            target="_blank"
            class="btn custom-btn-pdf d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:file-pdf-box" width="18"></iconify-icon>

                <span>CETAK PDF</span>

            </a>

        </div>

    </div>

    <!-- FILTER CABANG & SEARCH -->
    <div class="d-flex align-items-start justify-content-between gap-4 mb-3">

        <!-- FILTER CABANG -->
        <div>

            <div class="cabang-filter d-flex flex-nowrap mb-4">

                <a href="{{ route('anggota.index') }}"
                class="cabang-filter-btn {{ request('cabang') == null ? 'active' : '' }}">
                    Semua
                </a>

                @foreach($cabangs as $cabang)

                    <a
                        href="{{ route('anggota.index',[
                            'cabang'=>$cabang->id,
                            'filter'=>request('filter'),
                            'search'=>request('search')
                        ]) }}"
                        class="cabang-filter-btn
                        {{ request('cabang') == $cabang->id ? 'active' : '' }}">

                        {{ $cabang->nama_cabang }}

                    </a>

                @endforeach

            </div>

            @if(request('cabang'))

                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">

                    <a
                        href="{{ route('anggota.index',[
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
                            href="{{ route('anggota.index',[
                                'cabang'=>request('cabang'),
                                'ranting'=>$ranting->id,
                                'filter'=>request('filter'),
                                'search'=>request('search')
                            ]) }}"
                            class="filter-ranting-line
                            {{ request('ranting') == $ranting->id ? 'active' : '' }}">

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

                @forelse($anggotas as $anggota)

                <tr>

                    <td>{{ $anggota->nik }}</td>

                    <td>{{ $anggota->nama }}</td>

                    <td>{{ $anggota->jenis_kelamin }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}
                    </td>

                    <td>{{ $anggota->alamat }}</td>

                    <td>{{ $anggota->pekerjaan }}</td>

                    <td>{{ $anggota->pendidikan }}</td>

                    <td>

                        @if(strtoupper($anggota->status) == 'AKTIF')

                            <span class="status-badge status-active">
                                AKTIF
                            </span>

                        @elseif(strtoupper($anggota->status) == 'VAKUM')

                            <span class="status-badge status-nonaktif">
                                VAKUM
                            </span>

                        @else

                            <span class="status-badge status-kurang">
                                KURANG AKTIF
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex justify-content-center gap-2">

                            <button
                                class="action-btn btn-detail"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $anggota->nik }}">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <button
                                class="action-btn btn-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $anggota->nik }}">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

                            <button
                                class="action-btn btn-delete"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $anggota->nik }}">

                                <iconify-icon icon="mdi:trash-can"></iconify-icon>

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9" class="text-center py-4">

                        Tidak ada data anggota

                    </td>

                </tr>

                @endforelse
            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

        <div class="table-info-text">
            Menunjukan

            {{ $anggotas->firstItem() ?? 0 }}

            sampai

            {{ $anggotas->lastItem() ?? 0 }}

            dari

            {{ $anggotas->total() }}

            entri        
        </div>

        <div class="custom-pagination d-flex align-items-center">

            @if ($anggotas->onFirstPage())

                <button class="page-btn page-prev" disabled>
                    Sebelumnya
                </button>

            @else

                <a
                    href="{{ $anggotas->previousPageUrl() }}"
                    class="page-btn page-prev">

                    Sebelumnya

                </a>

            @endif

            @php
                $start = max($anggotas->currentPage() - 2, 1);
                $end = min($start + 4, $anggotas->lastPage());

                if (($end - $start) < 4) {
                    $start = max($end - 4, 1);
                }
            @endphp

            @for ($page = $start; $page <= $end; $page++)

                <a
                    href="{{ $anggotas->url($page) }}"
                    class="page-btn {{ $page == $anggotas->currentPage() ? 'active' : '' }}">

                    {{ $page }}

                </a>

            @endfor

            @if ($anggotas->hasMorePages())

                <a
                    href="{{ $anggotas->nextPageUrl() }}"
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

@include('organisasi.anggota.modals.detail')
@include('organisasi.anggota.modals.edit')
@include('organisasi.anggota.modals.delete')

@endsection