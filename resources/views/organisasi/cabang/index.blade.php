@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">


<!-- PAGE HEADER -->
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

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

                <option value="NONAKTIF"
                    {{ request('filter')=='NONAKTIF' ? 'selected' : '' }}>
                    nonaktif
                </option>

                <option value="KURANG AKTIF"
                    {{ request('filter')=='KURANG AKTIF' ? 'selected' : '' }}>
                    kurang aktif
                </option>

            </select>
        </form>

    </div>

    <!-- ACTION -->
    <div class="d-flex align-items-center gap-3 flex-wrap">

        <!-- ADD -->
        <a href="{{ route('cabang.create') }}"
           class="btn btn-add custom-btn-add d-flex align-items-center gap-2">

            <iconify-icon icon="mdi:plus" width="20"></iconify-icon>

            <span>TAMBAH DATA</span>

        </a>

        <!-- PDF -->
        <a href="{{ route('cabang.pdf') }}"
        target="_blank"
        class="btn btn-info custom-btn-pdf d-flex align-items-center gap-2">

            <iconify-icon icon="mdi:file-pdf-box" width="18"></iconify-icon>

            <span>CETAK PDF</span>

        </a>    
    </div>

</div>

<!-- SEARCH -->
<div class="d-flex justify-content-end mb-3">

    <form method="GET" class="d-flex align-items-center gap-2">

        <span class="search-label">
            Cari data :
        </span>

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control custom-search"
            placeholder="Cari...">

    </form>
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

                @forelse ($cabangs as $cabang)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $cabang->id }}
                    </td>

                    <td>
                        {{ $cabang->nama_cabang }}
                    </td>

                    <td>

                        @if($cabang->status == 'aktif')

                            <span class="status-badge status-active">
                                AKTIF
                            </span>

                        @elseif($cabang->status == 'vakum')

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

                            <!-- DETAIL -->
                            <button class="action-btn btn-detail"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $cabang->id }}">

                                <iconify-icon icon="mdi:eye"></iconify-icon>

                            </button>

                            <!-- EDIT -->
                            <button class="action-btn btn-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $cabang->id }}">

                                <iconify-icon icon="mdi:pencil"></iconify-icon>

                            </button>

                            <!-- DELETE -->
                            <button class="action-btn btn-delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $cabang->id }}">

                                <iconify-icon icon="mdi:trash-can"></iconify-icon>

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-4">

                        Tidak ada data cabang

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- FOOTER TABLE -->
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">

    <!-- INFO -->
    <div class="table-info-text">

        Menampilkan

        {{ $cabangs->count() }}

        dari

        {{ $cabangs->total() }}

        data

    </div>

    <!-- PAGINATION -->
    <div>

        {{ $cabangs->links() }}

    </div>

</div>


</div>

@endsection

@include('organisasi.cabang.modals.detail')
@include('organisasi.cabang.modals.edit')
@include('organisasi.cabang.modals.delete')
