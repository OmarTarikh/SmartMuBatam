{{-- ========================================
     resources/views/kegiatan/modals/edit.blade.php
======================================== --}}

@foreach($kegiatans as $item)

<div class="modal fade"
     id="editModal{{ $item->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Edit Kegiatan

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <form
                action="{{ route('kegiatan.update',$item->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <!-- NAMA KEGIATAN -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Nama Kegiatan

                        </label>

                        <input
                            type="text"
                            name="nama_kegiatan"
                            value="{{ $item->nama_kegiatan }}"
                            class="form-control custom-input">

                    </div>

                    <!-- CABANG -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Cabang

                        </label>

                        <select
                            name="cabang_id"
                            class="form-select custom-input">

                            @foreach($cabangs as $cabang)

                                <option
                                    value="{{ $cabang->id }}"
                                    {{ $item->cabang_id == $cabang->id ? 'selected' : '' }}>

                                    {{ $cabang->nama_cabang }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- JENIS -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Jenis Kegiatan

                        </label>

                        <select
                            name="jenis"
                            class="form-select custom-input">

                            <option
                                value="agenda"
                                {{ $item->jenis == 'agenda' ? 'selected' : '' }}>

                                Agenda

                            </option>

                            <option
                                value="program_kerja"
                                {{ $item->jenis == 'program_kerja' ? 'selected' : '' }}>

                                Program Kerja

                            </option>

                        </select>

                    </div>

                    <!-- PROGRESS -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Progress (%)

                        </label>

                        <input
                            type="number"
                            name="progres_persen"
                            min="0"
                            max="100"
                            value="{{ $item->progres_persen }}"
                            class="form-control custom-input">

                    </div>

                                        <!-- TANGGAL MULAI -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Tanggal Mulai

                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('Y-m-d') }}"
                            class="form-control custom-input">

                    </div>

                    <!-- TANGGAL SELESAI -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Tanggal Selesai

                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            value="{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('Y-m-d') }}"
                            class="form-control custom-input">

                    </div>

                    <!-- TARGET -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Target

                        </label>

                        <input
                            type="text"
                            name="target"
                            value="{{ $item->target }}"
                            class="form-control custom-input">

                    </div>

                    <!-- LOKASI -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Lokasi

                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            value="{{ $item->lokasi }}"
                            class="form-control custom-input">

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="mb-4">

                        <label class="modal-label">

                            Deskripsi

                        </label>

                        <textarea
                            name="deskripsi"
                            rows="4"
                            class="form-control custom-input">{{ $item->deskripsi }}</textarea>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end gap-2">

                        <button
                            type="button"
                            class="btn modal-cancel-btn"
                            data-bs-dismiss="modal">

                            Batal

                        </button>

                        <button
                            type="submit"
                            class="btn modal-save-btn">

                            Simpan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach