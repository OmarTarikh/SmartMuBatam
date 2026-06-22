{{-- ========================================
     PERTUMBUHAN WARGA
======================================== --}}
<div class="modal fade" id="growthModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Detail Pertumbuhan Warga
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="modal-field">

                    <label>Total Bertambah</label>

                    <div class="modal-value">
                        590 Anggota
                    </div>

                </div>

                <div class="modal-field">

                    <label>Total Berkurang</label>

                    <div class="modal-value">
                        180 Anggota
                    </div>

                </div>

                <div class="modal-field">

                    <label>Pertumbuhan Bersih</label>

                    <div class="modal-value">
                        +410 Anggota
                    </div>

                </div>

                <div class="modal-field">

                    <label>Cabang Teraktif</label>

                    <div class="modal-value">
                        Batam Kota
                    </div>

                </div>

                <div class="d-flex justify-content-end mt-4">

                    <a href="{{ url('/organisasi/anggota') }}"
                       class="btn modal-save-btn">

                        Lihat Data Anggota

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================
     GURU VS MURID
======================================== --}}
<div class="modal fade" id="guruMuridModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Detail Rasio Guru dan Murid
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="modal-field">

                    <label>Jumlah Guru</label>

                    <div class="modal-value">
                        54 Orang
                    </div>

                </div>

                <div class="modal-field">

                    <label>Jumlah Murid</label>

                    <div class="modal-value">
                        218 Orang
                    </div>

                </div>

                <div class="modal-field">

                    <label>Rasio</label>

                    <div class="modal-value">
                        1 Guru : 4 Murid
                    </div>

                </div>

                <div class="modal-field">

                    <label>Total Sekolah</label>

                    <div class="modal-value">
                        37 Sekolah
                    </div>

                </div>

                <div class="d-flex justify-content-end mt-4">

                    <a href="{{ url('/unit-lembaga/aum/sekolah') }}"
                       class="btn modal-save-btn">

                        Lihat Data Sekolah

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================
     RASIO KEAKTIFAN
======================================== --}}
<div class="modal fade" id="keaktifanModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Detail Rasio Keaktifan
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="modal-field">

                    <label>Aktif</label>

                    <div class="modal-value">
                        80%
                    </div>

                </div>

                <div class="modal-field">

                    <label>Vakum</label>

                    <div class="modal-value">
                        5%
                    </div>

                </div>

                <div class="modal-field">

                    <label>Tidak Aktif</label>

                    <div class="modal-value">
                        15%
                    </div>

                </div>

                <div class="modal-field">

                    <label>Total Anggota</label>

                    <div class="modal-value">
                        578 Orang
                    </div>

                </div>

                <div class="d-flex justify-content-end mt-4">

                    <a href="{{ url('/organisasi/anggota') }}"
                       class="btn modal-save-btn">

                        Lihat Data Anggota

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>