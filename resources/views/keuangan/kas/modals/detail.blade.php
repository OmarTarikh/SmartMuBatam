{{-- ========================================
     resources/views/keuangan/kas/modals/detail.blade.php
======================================== --}}

@foreach($kas as $item)

<div class="modal fade"
     id="detailModal{{ $item->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">

                    Detail Data Kas

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

                <!-- JENIS KAS -->
                <div class="modal-field">

                    <label>

                        Jenis Kas

                    </label>

                    <div class="modal-value">

                        @if(optional($item->kas)->tipe == 'masuk')

                            <span class="status-badge status-active">

                                KAS MASUK

                            </span>

                        @else

                            <span class="status-badge status-nonaktif">

                                KAS KELUAR

                            </span>

                        @endif

                    </div>

                </div>

                <!-- JUMLAH -->
                <div class="modal-field">

                    <label>

                        Jumlah

                    </label>

                    <div class="modal-value">

                        Rp {{ number_format(optional($item->kas)->jumlah ?? 0,0,',','.') }}

                    </div>

                </div>

                <!-- TANGGAL -->
                <div class="modal-field">

                    <label>

                        Tanggal

                    </label>

                    <div class="modal-value">

                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                    </div>

                </div>

                <!-- LOKASI -->
                <div class="modal-field">

                    <label>

                        Lokasi

                    </label>

                    <div class="modal-value">

                        {{ $item->lokasi }}

                    </div>

                </div>

                <!-- KETERANGAN -->
                <div class="modal-field">

                    <label>

                        Keterangan

                    </label>

                    <div class="modal-value">

                        {{ optional($item->kas)->keterangan ?? '-' }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach