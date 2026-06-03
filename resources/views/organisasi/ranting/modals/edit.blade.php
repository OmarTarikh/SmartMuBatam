<!-- ========================================
     EDIT MODAL
======================================== -->
<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Edit Ranting
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <!-- ID RANTING -->
                <div class="mb-3">

                    <label class="modal-label">
                        ID Ranting
                    </label>

                    <input type="text"
                           class="form-control custom-input"
                           value="RTG-001">

                </div>

                <!-- NAMA RANTING -->
                <div class="mb-3">

                    <label class="modal-label">
                        Nama Ranting
                    </label>

                    <input type="text"
                           class="form-control custom-input"
                           value="Ranting Batam Center">

                </div>

                <!-- CABANG -->
                <div class="mb-3">

                    <label class="modal-label">
                        Cabang
                    </label>

                    <select class="form-select custom-input">

                        <option>Batam Kota</option>

                        <option>Bengkong</option>

                        <option>Batu Aji</option>

                        <option>Nongsa</option>

                        <option>Sekupang</option>

                    </select>

                </div>

                <!-- STATUS -->
                <div class="mb-4">

                    <label class="modal-label">
                        Status
                    </label>

                    <select class="form-select custom-input">

                        <option>AKTIF</option>

                        <option>NONAKTIF</option>

                        <option>KURANG AKTIF</option>

                    </select>

                </div>

                <!-- BUTTON -->
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