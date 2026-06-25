{{-- ========================================
     resources/views/unit-lembaga/aum/klinik/modals/detail.blade.php
======================================== --}}

@foreach($aums as $aum)

<div class="modal fade"
     id="detailModal{{ $aum->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Detail AUM Klinik

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <!-- NAMA -->
                <div class="modal-field">

                    <label>

                        Nama Klinik

                    </label>

                    <div class="modal-value">

                        {{ $aum->nama_aum }}

                    </div>

                </div>

                <!-- CABANG -->
                <div class="modal-field">

                    <label>

                        Cabang

                    </label>

                    <div class="modal-value">

                        {{ $aum->cabang->nama_cabang ?? '-' }}

                    </div>

                </div>

                <!-- RANTING -->
                <div class="modal-field">

                    <label>

                        Ranting

                    </label>

                    <div class="modal-value">

                        {{ $aum->ranting->nama_ranting ?? '-' }}

                    </div>

                </div>

                <!-- PASIEN -->
                <div class="modal-field">

                    <label>

                        Jumlah Pasien

                    </label>

                    <div class="modal-value">

                        {{ $aum->jumlah_pasien }}

                    </div>

                </div>

                <!-- DOKTER -->
                <div class="modal-field">

                    <label>

                        Jumlah Dokter

                    </label>

                    <div class="modal-value">

                        {{ $aum->jumlah_dokter }}

                    </div>

                </div>

                <!-- KAPASITAS -->
                <div class="modal-field">

                    <label>

                        Kapasitas

                    </label>

                    <div class="modal-value">

                        {{ $aum->kapasitas }}

                    </div>

                </div>

                <!-- TAHUN -->
                <div class="modal-field">

                    <label>

                        Tahun Berdiri

                    </label>

                    <div class="modal-value">

                        {{ $aum->tahun }}

                    </div>

                </div>

                <!-- ALAMAT -->
                <div class="modal-field">

                    <label>

                        Alamat

                    </label>

                    <div class="modal-value">

                        {{ $aum->alamat }}

                    </div>

                </div>

                <!-- STATUS -->
                <div class="modal-field">

                    <label>

                        Status Perizinan

                    </label>

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

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach