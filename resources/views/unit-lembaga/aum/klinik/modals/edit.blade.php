{{-- ========================================
     resources/views/unit-lembaga/aum/klinik/modals/edit.blade.php
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

                    Edit AUM Klinik

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

                            Nama Klinik

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
                                    {{ $aum->cabang_id == $cabang->id ? 'selected' : '' }}>

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

                            @foreach($rantings->where('cabang_id',$aum->cabang_id) as $ranting)

                                <option
                                    value="{{ $ranting->id }}"
                                    {{ $aum->ranting_id == $ranting->id ? 'selected' : '' }}>

                                    {{ $ranting->nama_ranting }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- JUMLAH PASIEN -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Jumlah Pasien

                        </label>

                        <input
                            type="number"
                            name="jumlah_pasien"
                            value="{{ $aum->jumlah_pasien }}"
                            class="form-control custom-input">

                    </div>

                    <!-- JUMLAH DOKTER -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Jumlah Dokter

                        </label>

                        <input
                            type="number"
                            name="jumlah_dokter"
                            value="{{ $aum->jumlah_dokter }}"
                            class="form-control custom-input">

                    </div>

                    <!-- KAPASITAS -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Kapasitas

                        </label>

                        <input
                            type="number"
                            name="kapasitas"
                            value="{{ $aum->kapasitas }}"
                            class="form-control custom-input">

                    </div>

                    <!-- TAHUN -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Tahun Berdiri

                        </label>

                        <select
                            name="tahun"
                            class="form-select custom-input">

                            @for($i=date('Y'); $i>=1950; $i--)

                                <option
                                    value="{{ $i }}"
                                    {{ $aum->tahun == $i ? 'selected' : '' }}>

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

            })

            .catch(function(){

                ranting.innerHTML = `
                    <option value="">
                        Gagal memuat data
                    </option>
                `;

            });

        }

        // Load pertama kali
        loadRanting(defaultRanting);

        // Ketika cabang berubah
        select.addEventListener('change', function(){

            loadRanting();

        });

        // Ketika modal ditutup
        modal.addEventListener('hidden.bs.modal', function(){

            form.reset();

            select.value = defaultCabang;

            loadRanting(defaultRanting);

        });

    });

});

</script>

@endpush