{{-- ========================================
     resources/views/organisasi/anggota/modals/delete.blade.php
======================================== --}}

@foreach($anggotas as $anggota)

<div class="modal fade"
     id="deleteModal{{ $anggota->nik }}"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-sm">

        <div class="modal-content custom-modal">

            <div class="modal-body text-center p-4">

                <div class="delete-icon mb-3">

                    <iconify-icon icon="mdi:trash-can-outline"></iconify-icon>

                </div>

                <h5 class="delete-title">

                    Hapus Data?

                </h5>

                <p class="delete-text">

                    Yakin ingin menghapus anggota

                    <br>

                    <strong>

                        {{ $anggota->nama }}

                    </strong>

                    ?

                </p>

                <form
                    action="{{ route('anggota.destroy',$anggota->nik) }}"
                    method="POST">

                    @csrf

                    @method('DELETE')

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

                </form>

            </div>

        </div>

    </div>

</div>

@endforeach