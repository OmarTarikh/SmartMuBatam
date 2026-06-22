<!-- ========================================
     EDIT MODAL
======================================== -->
@foreach($cabangs as $cabang)

<div class="modal fade" id="editModal{{ $cabang->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <form action="{{ route('cabang.update',$cabang->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <!-- HEADER -->
                <div class="modal-header custom-modal-header">

                    <h5 class="modal-title">
                        Edit Cabang
                    </h5>

                    <button type="button"
                            class="btn-close shadow-none"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <!-- ID -->
                    <div class="mb-3">

                        <label class="modal-label">
                            ID Cabang
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               value="{{ $cabang->id }}"
                               readonly>

                    </div>

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="modal-label">
                            Nama Cabang
                        </label>

                        <input type="text"
                               name="nama_cabang"
                               class="form-control custom-input"
                               value="{{ $cabang->nama_cabang }}">

                    </div>

                    <!-- STATUS -->
                    <div class="mb-4">

                        <label class="modal-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select custom-input">

                            <option value="aktif"
                                {{ $cabang->status=='aktif'?'selected':'' }}>
                                AKTIF
                            </option>

                            <option value="kurang aktif"
                                {{ $cabang->status=='kurang aktif'?'selected':'' }}>
                                KURANG AKTIF
                            </option>

                            <option value="vakum"
                                {{ $cabang->status=='vakum'?'selected':'' }}>
                                VAKUM
                            </option>

                        </select>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end gap-2">

                        <button class="btn modal-cancel-btn"
                                data-bs-dismiss="modal"
                                type="button">

                            Batal

                        </button>

                        <button class="btn modal-save-btn">

                            Simpan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach