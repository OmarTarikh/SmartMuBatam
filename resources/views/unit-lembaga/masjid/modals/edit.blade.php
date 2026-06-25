{{-- ========================================
     EDIT MODAL
======================================== --}}

@foreach($masjids as $masjid)

<div class="modal fade"
     id="editModal{{ $masjid->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Edit Masjid

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- FORM -->
            <form
                action="{{ route('masjid.update',$masjid->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Nama Masjid

                        </label>

                        <input
                            type="text"
                            name="nama_masjid"
                            value="{{ $masjid->nama_masjid }}"
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
                            data-id="{{ $masjid->id }}"
                            data-selected="{{ $masjid->ranting_id }}">

                            @foreach($cabangs as $cabang)

                                <option
                                    value="{{ $cabang->id }}"
                                    {{ $masjid->ranting?->cabang_id == $cabang->id ? 'selected' : '' }}>

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
                            id="ranting{{ $masjid->id }}"
                            name="ranting_id"
                            class="form-select custom-input">

                            @foreach($rantings->where('cabang_id',$masjid->ranting?->cabang_id) as $ranting)

                                <option
                                    value="{{ $ranting->id }}"
                                    {{ $ranting->id==$masjid->ranting_id?'selected':'' }}>

                                    {{ $ranting->nama_ranting }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- ALAMAT -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Alamat

                        </label>

                        <textarea
                            rows="3"
                            name="alamat"
                            class="form-control custom-input">{{ $masjid->alamat }}</textarea>

                    </div>

                    <!-- STATUS -->
                    <div class="mb-4">

                        <label class="modal-label">

                            Status Legalitas

                        </label>

                        <select
                            name="status_legalitas"
                            class="form-select custom-input">

                            <option
                                value="sertifikat"
                                {{ $masjid->status_legalitas=='sertifikat'?'selected':'' }}>

                                SERTIFIKAT

                            </option>

                            <option
                                value="proses"
                                {{ $masjid->status_legalitas=='proses'?'selected':'' }}>

                                PROSES

                            </option>

                            <option
                                value="belum"
                                {{ $masjid->status_legalitas=='belum'?'selected':'' }}>

                                BELUM

                            </option>

                        </select>

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


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded',function(){

    document.querySelectorAll('.cabang-select').forEach(function(select){

        const modalId=select.dataset.id;

        const ranting=document.getElementById('ranting'+modalId);

        function loadRanting(selected=null){

            fetch('/unit-lembaga/masjid/get-ranting/'+select.value)

            .then(res=>res.json())

            .then(data=>{

                ranting.innerHTML='';

                data.forEach(function(item){

                    ranting.innerHTML+=`
                        <option value="${item.id}"
                        ${selected==item.id?'selected':''}>
                            ${item.nama_ranting}
                        </option>
                    `;

                });

            });

        }

        loadRanting(select.dataset.selected);

        select.addEventListener('change',function(){

            loadRanting();

        });

    });


    document.querySelectorAll('.modal').forEach(function(modal){

        modal.addEventListener('hidden.bs.modal',function(){

            this.querySelector('form').reset();

        });

    });

});

</script>

@endpush