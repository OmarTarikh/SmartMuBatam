{{-- ========================================
     resources/views/unit-lembaga/aum/sekolah/modals/delete.blade.php
======================================== --}}

@foreach($aums as $aum)

<div class="modal fade"
     id="deleteModal{{ $aum->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-sm">

        <div class="modal-content custom-modal">

            <div class="modal-body text-center p-4">

                <!-- ICON -->
                <div class="delete-icon mb-3">

                    <iconify-icon
                        icon="mdi:trash-can-outline">
                    </iconify-icon>

                </div>

                <!-- TITLE -->
                <h5 class="delete-title">

                    Hapus Data?

                </h5>

                <!-- TEXT -->
                <p class="delete-text">

                    Data

                    <strong>

                        {{ $aum->nama_aum }}

                    </strong>

                    akan dihapus permanen.

                </p>

                <!-- BUTTON -->
                <div class="d-flex justify-content-center gap-2 mt-4">

                    <button
                        type="button"
                        class="btn modal-cancel-btn"
                        data-bs-dismiss="modal">

                        Batal

                    </button>

                    <form
                        action="{{ route('aum.destroy',$aum->id) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn modal-delete-btn">

                            Hapus

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach