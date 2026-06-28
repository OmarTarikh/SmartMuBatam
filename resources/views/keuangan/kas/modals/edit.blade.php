<div class="modal fade" id="editModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Edit Keuangan
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label class="modal-label">
                        Jenis
                    </label>

                    <select class="form-select custom-input">

                        <option>kas_masuk</option>
                        <option>kas_keluar</option>
                        <option>aset_tanah</option>
                        <option>aset_bangunan</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="modal-label">
                        Jumlah
                    </label>

                    <input type="number"
                           class="form-control custom-input"
                           value="5000000">

                </div>

                <div class="mb-3">

                    <label class="modal-label">
                        Keterangan
                    </label>

                    <input type="text"
                           class="form-control custom-input"
                           value="Donasi Jumat">

                </div>

                <div class="mb-3">

                    <label class="modal-label">
                        Lokasi
                    </label>

                    <input type="text"
                           class="form-control custom-input"
                           value="Baloi">

                </div>

                <div class="mb-4">

                    <label class="modal-label">
                        Tanggal
                    </label>

                    <input type="date"
                           class="form-control custom-input"
                           value="2025-01-10">

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