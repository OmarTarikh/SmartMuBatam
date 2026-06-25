{{-- ========================================
     DETAIL MODAL
======================================== --}}

@foreach($masjids as $masjid)

<div class="modal fade"
     id="detailModal{{ $masjid->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Detail Masjid

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <!-- ID -->
                <div class="modal-field">

                    <label>ID Masjid</label>

                    <div class="modal-value">

                        {{ $masjid->id }}

                    </div>

                </div>

                <!-- NAMA -->
                <div class="modal-field">

                    <label>Nama Masjid</label>

                    <div class="modal-value">

                        {{ $masjid->nama_masjid }}

                    </div>

                </div>

                <!-- CABANG -->
                <div class="modal-field">

                    <label>Cabang</label>

                    <div class="modal-value">

                        {{ $masjid->ranting?->cabang?->nama_cabang ?? '-' }}

                    </div>

                </div>

                <!-- RANTING -->
                <div class="modal-field">

                    <label>Ranting</label>

                    <div class="modal-value">

                        {{ $masjid->ranting->nama_ranting ?? '-' }}

                    </div>

                </div>

                <!-- ALAMAT -->
                <div class="modal-field">

                    <label>Alamat</label>

                    <div class="modal-value">

                        {{ $masjid->alamat ?? '-' }}

                    </div>

                </div>

                <!-- STATUS -->
                <div class="modal-field">

                    <label>Status Legalitas</label>

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

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach