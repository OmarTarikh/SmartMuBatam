{{-- ========================================
     DELETE MODAL
======================================== --}}

@foreach($masjids as $masjid)

<div class="modal fade"
     id="deleteModal{{ $masjid->id }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-sm">

        <div class="modal-content custom-modal">

            <form
                action="{{ route('masjid.destroy',$masjid->id) }}"
                method="POST">

                @csrf
                @method('DELETE')

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

                        Data masjid

                        <strong>

                            "{{ $masjid->nama_masjid }}"

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

                        <button
                            type="submit"
                            class="btn modal-delete-btn">

                            Hapus

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endforeach