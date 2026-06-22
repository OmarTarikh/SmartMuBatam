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

            </div>

        </div>

    </div>

</div>

@endforeach