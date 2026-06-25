<!-- ========================================
     DETAIL MODAL
======================================== -->
@foreach($cabangs as $cabang)

<div class="modal fade" id="detailModal{{ $cabang->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content custom-modal">

            <!-- HEADER -->
            <div class="modal-header custom-modal-header">

                <h5 class="modal-title">
                    Detail Cabang
                </h5>

                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <div class="modal-field">

                    <label>ID Cabang</label>

                    <div class="modal-value">
                        {{ $cabang->id }}
                    </div>

                </div>

                <div class="modal-field">

                    <label>Nama Cabang</label>

                    <div class="modal-value">
                        {{ $cabang->nama_cabang }}
                    </div>

                </div>

                <div class="modal-field">

                    <label>Status</label>

                    @if($cabang->status == 'aktif')
                        <span class="status-badge status-active">
                            AKTIF
                        </span>

                    @elseif($cabang->status == 'vakum')
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
                    Daftar Ranting
                </h6>

                <div class="table-responsive">

                    <table class="table table-sm custom-table align-middle mb-0">

                        <thead>

                            <tr>

                                <th width="8%">No</th>

                                <th>Nama Ranting</th>

                                <th width="28%">Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($cabang->rantings as $ranting)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $ranting->nama_ranting }}
                                    </td>

                                    <td>

                                        @if($ranting->status == 'AKTIF')

                                            <span class="status-badge status-active">
                                                AKTIF
                                            </span>

                                        @elseif($ranting->status == 'VAKUM')

                                            <span class="status-badge status-nonaktif">
                                                VAKUM
                                            </span>

                                        @else

                                            <span class="status-badge status-kurang">
                                                KURANG AKTIF
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3" class="text-center py-3">

                                        Belum ada data ranting

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

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

                                    {{ $cabang->anggota_count }}

                                </td>

                                <td>

                                    {{ $cabang->anggota_aktif_count }}

                                </td>

                                <td>

                                    {{ $cabang->anggota_vakum_count }}

                                </td>

                                <td>

                                    {{ $cabang->anggota_kurang_count }}

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