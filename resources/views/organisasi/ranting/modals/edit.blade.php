<!-- ========================================
     EDIT MODAL
======================================== -->
@foreach ($rantings as $ranting)

<div class="modal fade" id="editModal{{ $ranting->id }}" tabindex="-1">

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

            <form action="{{ route('ranting.update',$ranting->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="modal-label">
                            Nama Ranting
                        </label>

                        <input type="text"
                               name="nama_ranting"
                               class="form-control custom-input"
                               value="{{ $ranting->nama_ranting }}">

                    </div>

                    <!-- CABANG -->
                    <div class="mb-3">

                        <label class="modal-label">
                            Cabang
                        </label>

                        <select name="cabang_id"
                                class="form-select custom-input">

                            @foreach ($cabangs as $cabang)

                            <option value="{{ $cabang->id }}"
                            {{ $ranting->cabang_id==$cabang->id ? 'selected' : '' }}>

                                {{ $cabang->nama_cabang }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- STATUS -->
                    <div class="mb-4">

                        <label class="modal-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select custom-input">

                            <option value="AKTIF"
                            {{ $ranting->status=='AKTIF' ? 'selected' : '' }}>
                                AKTIF
                            </option>

                            <option value="VAKUM"
                            {{ $ranting->status=='VAKUM' ? 'selected' : '' }}>
                                VAKUM
                            </option>

                            <option value="KURANG AKTIF"
                            {{ $ranting->status=='KURANG AKTIF' ? 'selected' : '' }}>
                                KURANG AKTIF
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

                        <button class="btn modal-save-btn"
                                type="submit">

                            Simpan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach