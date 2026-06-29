{{-- ========================================
     resources/views/kegiatan/modals/detail.blade.php
======================================== --}}

@foreach($kegiatans as $item)

<div class="modal fade"
     id="detailModal{{ $item->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Detail Kegiatan

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <!-- NAMA KEGIATAN -->
                <div class="modal-field">

                    <label>

                        Nama Kegiatan

                    </label>

                    <div class="modal-value">

                        {{ $item->nama_kegiatan }}

                    </div>

                </div>

                <!-- CABANG -->
                <div class="modal-field">

                    <label>

                        Cabang

                    </label>

                    <div class="modal-value">

                        {{ $item->cabang->nama_cabang ?? '-' }}

                    </div>

                </div>

                <!-- JENIS -->
                <div class="modal-field">

                    <label>

                        Jenis

                    </label>

                    <div class="modal-value">

                        @if($item->jenis == 'agenda')

                            <span class="status-badge status-active">

                                AGENDA

                            </span>

                        @else

                            <span class="status-badge status-kurang">

                                PROGRAM KERJA

                            </span>

                        @endif

                    </div>

                </div>

                <!-- TARGET -->
                <div class="modal-field">

                    <label>

                        Target

                    </label>

                    <div class="modal-value">

                        {{ $item->target }}

                    </div>

                </div>

                <!-- PROGRESS -->
                <div class="modal-field">

                    <label>

                        Progress

                    </label>

                    <div class="modal-value">

                        {{ $item->progres_persen }}%

                    </div>

                </div>

                <!-- TANGGAL MULAI -->
                <div class="modal-field">

                    <label>

                        Tanggal Mulai

                    </label>

                    <div class="modal-value">

                        {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}

                    </div>

                </div>

                <!-- TANGGAL SELESAI -->
                <div class="modal-field">

                    <label>

                        Tanggal Selesai

                    </label>

                    <div class="modal-value">

                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}

                    </div>

                </div>

                <!-- LOKASI -->
                <div class="modal-field">

                    <label>

                        Lokasi

                    </label>

                    <div class="modal-value">

                        {{ $item->lokasi }}

                    </div>

                </div>

                <!-- DESKRIPSI -->
                <div class="modal-field">

                    <label>

                        Deskripsi

                    </label>

                    <div class="modal-value">

                        {{ $item->deskripsi }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach