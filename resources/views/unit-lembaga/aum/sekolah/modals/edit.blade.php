{{-- ========================================
     resources/views/unit-lembaga/aum/sekolah/modals/edit.blade.php
======================================== --}}

@foreach($aums as $aum)

<div class="modal fade"
     id="editModal{{ $aum->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Edit AUM Sekolah

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <form
                action="{{ route('aum.update',$aum->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Nama Sekolah

                        </label>

                        <input
                            type="text"
                            name="nama_aum"
                            value="{{ $aum->nama_aum }}"
                            class="form-control custom-input">

                    </div>

                    <!-- CABANG -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Cabang

                        </label>

                        <select
                            name="cabang_id"
                            class="form-select custom-input cabang-select"
                            data-id="{{ $aum->id }}"
                            data-selected="{{ $aum->ranting_id }}">
                            @foreach($cabangs as $cabang)

                                <option
                                    value="{{ $cabang->id }}"
                                    {{ $aum->cabang_id==$cabang->id?'selected':'' }}>

                                    {{ $cabang->nama_cabang }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- RANTING -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Ranting

                        </label>

                        <select
                            name="ranting_id"
                            id="ranting{{ $aum->id }}"
                            class="form-select custom-input">
                            @foreach($rantings->where('cabang_id', $aum->cabang_id) as $ranting)

                                <option
                                    value="{{ $ranting->id }}"
                                    {{ $aum->ranting_id == $ranting->id ? 'selected' : '' }}>

                                    {{ $ranting->nama_ranting }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <!-- SISWA -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Jumlah Siswa

                        </label>

                        <input
                            type="number"
                            name="jumlah_siswa"
                            value="{{ $aum->jumlah_siswa }}"
                            class="form-control custom-input">

                    </div>

                    <!-- GURU -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Jumlah Guru

                        </label>

                        <input
                            type="number"
                            name="jumlah_guru"
                            value="{{ $aum->jumlah_guru }}"
                            class="form-control custom-input">

                    </div>

                    <!-- AKREDITASI -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Akreditasi

                        </label>

                        <select
                            name="akreditasi"
                            class="form-select custom-input">

                            <option
                                value="A"
                                {{ $aum->akreditasi=='A'?'selected':'' }}>

                                A

                            </option>

                            <option
                                value="B"
                                {{ $aum->akreditasi=='B'?'selected':'' }}>

                                B

                            </option>

                            <option
                                value="C"
                                {{ $aum->akreditasi=='C'?'selected':'' }}>

                                C

                            </option>

                        </select>

                    </div>

                    <!-- TAHUN -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Tahun Berdiri

                        </label>

                        <select
                            name="tahun"
                            class="form-select custom-input">

                            @for($i=date('Y');$i>=1950;$i--)

                                <option
                                    value="{{ $i }}"
                                    {{ $aum->tahun==$i?'selected':'' }}>

                                    {{ $i }}

                                </option>

                            @endfor

                        </select>

                    </div>

                    <!-- ALAMAT -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="3"
                            class="form-control custom-input">{{ $aum->alamat }}</textarea>

                    </div>

                    <!-- STATUS -->
                    <div class="mb-4">

                        <label class="modal-label">

                            Status Perizinan

                        </label>

                        <select
                            name="status_perizinan"
                            class="form-select custom-input">

                            <option
                                value="aktif"
                                {{ $aum->status_perizinan=='aktif'?'selected':'' }}>

                                AKTIF

                            </option>

                            <option
                                value="tidak aktif"
                                {{ $aum->status_perizinan=='tidak aktif'?'selected':'' }}>

                                TIDAK AKTIF

                            </option>

                            <option
                                value="proses izin"
                                {{ $aum->status_perizinan=='proses izin'?'selected':'' }}>

                                PROSES IZIN

                            </option>

                        </select>

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

    document.querySelectorAll('.cabang-select').forEach(function (select) {

        const modalId = select.dataset.id;

        const modal = document.getElementById('editModal' + modalId);

        const form = modal.querySelector('form');

        const ranting = document.getElementById('ranting' + modalId);

        const defaultCabang = select.value;

        const defaultRanting = select.dataset.selected;

        function loadRanting(selected = null){

            fetch('/unit-lembaga/aum/get-ranting/' + select.value)

            .then(res => res.json())

            .then(data => {

                ranting.innerHTML = '<option value="">Pilih Ranting</option>';

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

        // pertama kali modal dibuat
        loadRanting(defaultRanting);

        // ketika cabang berubah
        select.addEventListener('change', function(){

            loadRanting();

        });

        // ketika modal ditutup
        modal.addEventListener('hidden.bs.modal', function(){

            // reset seluruh input
            form.reset();

            // kembalikan cabang
            select.value = defaultCabang;

            // muat ulang ranting sesuai data awal
            loadRanting(defaultRanting);

        });

    });

});
</script>

@endpush