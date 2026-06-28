{{-- ========================================
     resources/views/keuangan/infaq/modals/detail.blade.php
======================================== --}}

@foreach($infaqs as $item)

<div class="modal fade"
     id="detailModal{{ $item->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Detail Data Infaq

                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <!-- CABANG -->
                <div class="modal-field">

                    <label>

                        Cabang

                    </label>

                    <div class="modal-value">

                        {{ $item->cabang->nama_cabang ?? '-' }}

                    </div>

                </div>

                <!-- MASJID -->
                <div class="modal-field">

                    <label>

                        Masjid

                    </label>

                    <div class="modal-value">

                        {{ $item->masjid->nama_masjid ?? '-' }}

                    </div>

                </div>

                <!-- JUMLAH -->
                <div class="modal-field">

                    <label>

                        Jumlah Infaq

                    </label>

                    <div class="modal-value">

                        Rp {{ number_format(optional($item->infaq)->jumlah ?? 0,0,',','.') }}

                    </div>

                </div>

                <!-- LOKASI -->
                <div class="modal-field">

                    <label>

                        Lokasi

                    </label>

                    <div class="modal-value">

                        {{ $item->lokasi ?? '-' }}

                    </div>

                </div>

                <!-- TANGGAL -->
                <div class="modal-field">

                    <label>

                        Tanggal

                    </label>

                    <div class="modal-value">

                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}

                    </div>

                </div>

                <!-- KETERANGAN -->
                <div class="modal-field">

                    <label>

                        Keterangan

                    </label>

                    <div class="modal-value">

                        {{ optional($item->infaq)->keterangan ?? '-' }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach