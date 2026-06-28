{{-- ========================================
     resources/views/keuangan/infaq/modals/edit.blade.php
======================================== --}}

@foreach($infaqs as $item)

<div class="modal fade"
     id="editModal{{ $item->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Edit Data Infaq

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <form
                action="{{ route('keuangan.update',$item->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

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

                    <!-- MASJID -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Masjid

                        </label>

                        <select
                            name="masjid_id"
                            class="form-select custom-input">

                            @foreach($masjids as $masjid)

                                <option
                                    value="{{ $masjid->id }}"
                                    {{ $item->masjid_id == $masjid->id ? 'selected' : '' }}>

                                    {{ $masjid->nama_masjid }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- JUMLAH -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Jumlah Infaq

                        </label>

                        <div class="input-group">

                            <span class="input-group-text">

                                Rp

                            </span>

                            <input
                                type="text"
                                class="form-control custom-input jumlah-view"
                                value="{{ number_format(optional($item->infaq)->jumlah ?? 0,0,',','.') }}">

                            <input
                                type="hidden"
                                name="jumlah"
                                class="jumlah-real"
                                value="{{ optional($item->infaq)->jumlah }}">

                        </div>

                    </div>

                    <!-- TANGGAL -->
                    <div class="mb-3">

                        <label class="modal-label">

                            Tanggal

                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}"
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

                    <!-- KETERANGAN -->
                    <div class="mb-4">

                        <label class="modal-label">

                            Keterangan

                        </label>

                        <textarea
                            name="keterangan"
                            rows="4"
                            class="form-control custom-input">{{ optional($item->infaq)->keterangan }}</textarea>

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

document.addEventListener('DOMContentLoaded', function(){

    document.querySelectorAll('.jumlah-view').forEach(function(input){

        input.addEventListener('input', function(){

            let angka = this.value.replace(/\D/g,'');

            this.closest('.input-group')
                .querySelector('.jumlah-real')
                .value = angka;

            this.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g,".");

        });

    });

});

</script>

@endpush