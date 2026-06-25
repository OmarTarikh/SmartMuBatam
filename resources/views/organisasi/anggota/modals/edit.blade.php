{{-- ========================================
     resources/views/organisasi/anggota/modals/edit.blade.php
======================================== --}}

@foreach($anggotas as $anggota)

<div class="modal fade"
     id="editModal{{ $anggota->nik }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Edit Anggota

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form
                action="{{ route('anggota.update',$anggota->nik) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="row">

                        {{-- NIK --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                NIK

                            </label>

                            <input
                                type="text"
                                name="nik"
                                class="form-control custom-input"
                                value="{{ $anggota->nik }}"
                                readonly>

                        </div>

                        {{-- Nama --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Nama

                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control custom-input"
                                value="{{ $anggota->nama }}">

                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Jenis Kelamin

                            </label>

                            <select
                                name="jenis_kelamin"
                                class="form-select custom-input">

                                <option
                                    value="L"
                                    {{ $anggota->jenis_kelamin=='L'?'selected':'' }}>

                                    Laki-laki

                                </option>

                                <option
                                    value="P"
                                    {{ $anggota->jenis_kelamin=='P'?'selected':'' }}>

                                    Perempuan

                                </option>

                            </select>

                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Tanggal Lahir

                            </label>

                            <input
                                type="date"
                                name="tanggal_lahir"
                                class="form-control custom-input"
                                value="{{ $anggota->tanggal_lahir }}">

                        </div>

                        {{-- Alamat --}}
                        <div class="col-md-12 mb-3">

                            <label class="modal-label">

                                Alamat

                            </label>

                            <textarea
                                name="alamat"
                                rows="3"
                                class="form-control custom-input">{{ $anggota->alamat }}</textarea>

                        </div>

                        {{-- Cabang --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Cabang

                            </label>

                            <select
                                name="cabang_id"
                                class="form-select custom-input edit-cabang"
                                data-target="ranting{{ $anggota->nik }}"
                                data-selected="{{ $anggota->ranting_id }}">
                                @foreach($cabangs as $cabang)

                                    <option
                                        value="{{ $cabang->id }}"
                                        {{ $anggota->cabang_id==$cabang->id?'selected':'' }}>

                                        {{ $cabang->nama_cabang }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Ranting --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Ranting

                            </label>

                            <select
                                name="ranting_id"
                                id="ranting{{ $anggota->nik }}"
                                class="form-select custom-input">

                                @foreach($rantings as $ranting)

                                    @if($ranting->cabang_id==$anggota->cabang_id)

                                        <option
                                            value="{{ $ranting->id }}"
                                            {{ $anggota->ranting_id==$ranting->id?'selected':'' }}>

                                            {{ $ranting->nama_ranting }}

                                        </option>

                                    @endif

                                @endforeach

                            </select>

                        </div>

                        {{-- Pekerjaan --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Pekerjaan

                            </label>

                            <input
                                type="text"
                                name="pekerjaan"
                                class="form-control custom-input"
                                value="{{ $anggota->pekerjaan }}">

                        </div>

                        {{-- Pendidikan --}}
                        <div class="col-md-6 mb-3">

                            <label class="modal-label">

                                Pendidikan

                            </label>

                            <select
                                name="pendidikan"
                                class="form-select custom-input">

                                @foreach(['SMA','D3','S1','S2'] as $item)

                                    <option
                                        value="{{ $item }}"
                                        {{ $anggota->pendidikan==$item?'selected':'' }}>

                                        {{ $item }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-4">

                            <label class="modal-label">

                                Status

                            </label>

                            <select
                                name="status"
                                class="form-select custom-input">

                                <option value="AKTIF"
                                    {{ $anggota->status=='AKTIF'?'selected':'' }}>

                                    AKTIF

                                </option>

                                <option value="VAKUM"
                                    {{ $anggota->status=='VAKUM'?'selected':'' }}>

                                    VAKUM

                                </option>

                                <option value="KURANG AKTIF"
                                    {{ $anggota->status=='KURANG AKTIF'?'selected':'' }}>

                                    KURANG AKTIF

                                </option>

                            </select>

                        </div>

                    </div>

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

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.edit-cabang').forEach(function (select) {

        const targetId = select.dataset.target;

        const ranting = document.getElementById(targetId);

        const modal = select.closest('.modal');

        const form = modal.querySelector('form');

        const defaultCabang = select.value;

        const defaultRanting = select.dataset.selected;
        function loadRanting(selected = null){

            fetch('/organisasi/anggota/get-ranting/' + select.value)

            .then(res => res.json())

            .then(data => {

                ranting.innerHTML =
                    '<option value="">Pilih Ranting</option>';

                data.forEach(function(item){

                    ranting.innerHTML += `
                        <option value="${item.id}"
                            ${item.id == selected ? 'selected' : ''}>
                            ${item.nama_ranting}
                        </option>
                    `;

                });

            });

        }

        modal.addEventListener('show.bs.modal', function () {

            select.value = defaultCabang;

            loadRanting(defaultRanting);

        });
        // jika cabang berubah
        select.addEventListener('change', function(){

            loadRanting();

        });

        // reset ketika modal ditutup
        modal.addEventListener('hidden.bs.modal', function(){

            form.reset();

            select.value = defaultCabang;

            loadRanting(defaultRanting);

        });

    });

});

</script>
@endpush