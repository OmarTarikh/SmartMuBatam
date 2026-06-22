<!-- ========================================
     DELETE MODAL
======================================== -->
@foreach($cabangs as $cabang)

<div class="modal fade"
     id="deleteModal{{ $cabang->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-sm">

        <div class="modal-content custom-modal">

            <!-- BODY -->
            <div class="modal-body text-center p-4">

                <div class="delete-icon mb-3">

                    <iconify-icon icon="mdi:trash-can-outline">
                    </iconify-icon>

                </div>

                <h5 class="delete-title">
                    Hapus Data?
                </h5>

                <p class="delete-text">
                    {{ $cabang->nama_cabang }}
                    akan dihapus permanen
                </p>

                <form action="{{ route('cabang.destroy',$cabang->id) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <div class="d-flex justify-content-center gap-2 mt-4">

                        <button class="btn modal-cancel-btn"
                                data-bs-dismiss="modal"
                                type="button">

                            Batal

                        </button>

                        <button class="btn modal-delete-btn">

                            Hapus

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endforeach