<!-- ========================================
     DETAIL MODAL
======================================== -->
@foreach ($rantings as $ranting)

<div class="modal fade" id="detailModal{{ $ranting->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Detail Ranting
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <div class="modal-field">

                    <label>ID Ranting</label>

                    <div class="modal-value">
                        {{ $ranting->id }}
                    </div>

                </div>

                <div class="modal-field">

                    <label>Nama Ranting</label>

                    <div class="modal-value">
                        {{ $ranting->nama_ranting }}
                    </div>

                </div>

                <div class="modal-field">

                    <label>Cabang</label>

                    <div class="modal-value">
                        {{ $ranting->cabang->nama_cabang }}
                    </div>

                </div>

                <div class="modal-field">

                    <label>Status</label>

                            @if(strtoupper($ranting->status) == 'AKTIF')

                                <span class="status-badge status-active">
                                    AKTIF
                                </span>

                            @elseif(strtoupper($ranting->status) == 'VAKUM')

                                <span class="status-badge status-nonaktif">
                                    VAKUM
                                </span>

                            @else

                                <span class="status-badge status-kurang">
                                    KURANG AKTIF
                                </span>

                            @endif

                </div>
                <hr class="my-4">

                <h6 class="fw-semibold mb-3">
                    Statistik Anggota
                </h6>

                <div class="table-responsive">

                    <table class="table table-sm custom-table align-middle mb-0">

                        <thead>

                            <tr>

                                <th>Total</th>

                                <th>Aktif</th>

                                <th>Vakum</th>

                                <th>Kurang Aktif</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td>

                                    {{ $ranting->anggota_count }}

                                </td>

                                <td>

                                    {{ $ranting->anggota_aktif_count }}

                                </td>

                                <td>

                                    {{ $ranting->anggota_vakum_count }}

                                </td>

                                <td>

                                    {{ $ranting->anggota_kurang_count }}

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach