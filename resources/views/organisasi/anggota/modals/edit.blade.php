{{-- ========================================
     resources/views/organisasi/anggota/modals/edit.blade.php
======================================== --}}

<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Edit Anggota
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="modal-label">NIK</label>
                    <input type="text"
                           class="form-control custom-input"
                           value="1001">
                </div>

                <div class="mb-3">
                    <label class="modal-label">Nama</label>
                    <input type="text"
                           class="form-control custom-input"
                           value="Ahmad Fauzi">
                </div>

                <div class="mb-3">
                    <label class="modal-label">Jenis Kelamin</label>

                    <select class="form-select custom-input">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="modal-label">Pendidikan</label>

                    <select class="form-select custom-input">
                        <option>SMA</option>
                        <option>D3</option>
                        <option>S1</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="modal-label">Status</label>

                    <select class="form-select custom-input">
                        <option>AKTIF</option>
                        <option>NONAKTIF</option>
                        <option>KURANG AKTIF</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">

                    <button class="btn modal-cancel-btn"
                            data-bs-dismiss="modal">

                        Batal

                    </button>

                    <button class="btn modal-save-btn">

                        Simpan

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>