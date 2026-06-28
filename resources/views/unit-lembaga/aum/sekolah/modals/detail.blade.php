{{-- ========================================
     resources/views/unit-lembaga/aum/sekolah/modals/detail.blade.php
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

                    Detail AUM Sekolah

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

                        Nama AUM

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

                <!-- SISWA -->
                <div class="modal-field">

                    <label>

                        Jumlah Siswa

                    </label>

                    <div class="modal-value">

                        {{ optional($aum->sekolah)->jumlah_siswa ?? '-' }}

                    </div>

                </div>

                <!-- GURU -->
                <div class="modal-field">

                    <label>

                        Jumlah Guru

                    </label>

                    <div class="modal-value">

                        {{ optional($aum->sekolah)->jumlah_guru ?? '-' }}

                    </div>

                </div>

                <!-- AKREDITASI -->
                <div class="modal-field">

                    <label>

                        Akreditasi

                    </label>

                    <div class="modal-value">

                        {{ optional($aum->sekolah)->akreditasi ?? '-' }}

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