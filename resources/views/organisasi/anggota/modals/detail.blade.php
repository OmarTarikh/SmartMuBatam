{{-- ========================================
     resources/views/organisasi/anggota/modals/detail.blade.php
======================================== --}}

@foreach($anggotas as $anggota)

<div class="modal fade"
     id="detailModal{{ $anggota->nik }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Detail Anggota
                </h5>

                <button
                    type="button"
                    class="btn-close shadow-none"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="modal-field">

                    <label>NIK</label>

                    <div class="modal-value">

                        {{ $anggota->nik }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Nama</label>

                    <div class="modal-value">

                        {{ $anggota->nama }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Jenis Kelamin</label>

                    <div class="modal-value">

                        {{ $anggota->jenis_kelamin }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Tanggal Lahir</label>

                    <div class="modal-value">

                        {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Alamat</label>

                    <div class="modal-value">

                        {{ $anggota->alamat }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Cabang</label>

                    <div class="modal-value">

                        {{ $anggota->cabang->nama_cabang ?? '-' }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Ranting</label>

                    <div class="modal-value">

                        {{ $anggota->ranting->nama_ranting ?? '-' }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Pekerjaan</label>

                    <div class="modal-value">

                        {{ $anggota->pekerjaan }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Pendidikan</label>

                    <div class="modal-value">

                        {{ $anggota->pendidikan }}

                    </div>

                </div>


                <div class="modal-field">

                    <label>Status</label>

                    @if(strtoupper($anggota->status) == 'AKTIF')

                        <span class="status-badge status-active">

                            AKTIF

                        </span>

                    @elseif(strtoupper($anggota->status) == 'VAKUM')

                        <span class="status-badge status-nonaktif">

                            VAKUM

                        </span>

                    @else

                        <span class="status-badge status-kurang">

                            KURANG AKTIF

                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach