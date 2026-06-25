@extends('layouts.app')
@section('title', 'Manajemen Organisasi > Ranting')

@section('content')

<div class="container-fluid py-4">


    <!-- FILTER & ACTION -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-4 mb-3">

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
            <a href="{{ route('ranting.create') }}"
               class="btn custom-btn-add d-flex align-items-center gap-2">

                <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

                <span>TAMBAH DATA</span>

            </a>

            <!-- PDF -->
            <a href="{{ route('ranting.pdf') }}"
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
        <div class="cabang-filter d-flex flex-nowrap">
            <a
                href="{{ route('ranting.index') }}"
                class="cabang-filter-btn {{ request('cabang')==null ? 'active' : '' }}">

                Semua

            </a>

            @foreach($cabangs as $cabang)

                <a
                    href="{{ route('ranting.index',[
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

        <div class="table-responsive">

            <table class="table custom-table align-middle mb-0">

                <!-- HEAD -->
                <thead>

                    <tr>

                        <th width="8%">NO</th>

                        <th width="15%">ID</th>

                        <th>NAMA RANTING</th>

                        <th width="18%">STATUS</th>

                        <th width="15%">OPSI</th>

                        <th width="15%">ID CABANG</th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @forelse ($rantings as $ranting)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $ranting->id }}</td>

                        <td>{{ $ranting->nama_ranting }}</td>

                        <td>

                            @if(strtoupper($ranting->status) == 'AKTIF')

                                <span class="status-badge status-active">
                                    AKTIF
                                </span>

                            @elseif(strtoupper($ranting->status) == 'VAKUM')

                                <span class="status-badge status-nonaktif">
                                    VAKUM
                                </span>

                            @else

                                <span class="status-badge status-kurang">
                                    KURANG AKTIF
                                </span>

                            @endif

                        </td>
                        <!-- OPSI -->
                        <td>

                            <div class="d-flex justify-content-center gap-2">

                                <!-- DETAIL -->
                                <button class="action-btn btn-detail"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $ranting->id }}">

                                    <iconify-icon icon="mdi:eye"></iconify-icon>

                                </button>

                                <!-- EDIT -->
                                <button class="action-btn btn-edit"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $ranting->id }}">

                                    <iconify-icon icon="mdi:pencil"></iconify-icon>

                                </button>

                                <!-- DELETE -->
                                <button class="action-btn btn-delete"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $ranting->id }}">

                                    <iconify-icon icon="mdi:trash-can"></iconify-icon>

                                </button>

                            </div>

                        </td>

                        <!-- CABANG -->
                        <td>
                            {{ $ranting->cabang->nama_cabang }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-4">
                            Tidak ada data ranting
                        </td>
                    </tr>

                    @endforelse
                </tbody>

            </table>

        </div>

    </div>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

        <!-- INFO -->
        <div class="table-info-text">

            Menunjukan

            {{ $rantings->firstItem() ?? 0 }}

            sampai

            {{ $rantings->lastItem() ?? 0 }}

            dari

            {{ $rantings->total() }}

            entri

        </div>

        <!-- CUSTOM PAGINATION -->
        <div class="custom-pagination d-flex align-items-center">

            {{-- Sebelumnya --}}
            @if ($rantings->onFirstPage())

                <button class="page-btn page-prev" disabled>
                    Sebelumnya
                </button>

            @else

                <a
                    href="{{ $rantings->previousPageUrl() }}"
                    class="page-btn page-prev">

                    Sebelumnya

                </a>

            @endif


            {{-- Nomor halaman --}}
            @php
                $start = max($rantings->currentPage() - 2, 1);
                $end = min($start + 4, $rantings->lastPage());

                if (($end - $start) < 4) {
                    $start = max($end - 4, 1);
                }
            @endphp

            @for ($page = $start; $page <= $end; $page++)

                <a
                    href="{{ $rantings->url($page) }}"
                    class="page-btn {{ $page == $rantings->currentPage() ? 'active' : '' }}">

                    {{ $page }}

                </a>

            @endfor

            {{-- Berikutnya --}}
            @if ($rantings->hasMorePages())

                <a
                    href="{{ $rantings->nextPageUrl() }}"
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

@endsection

@include('organisasi.ranting.modals.detail')
@include('organisasi.ranting.modals.edit')
@include('organisasi.ranting.modals.delete')