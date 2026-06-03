@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- FORM CARD -->
    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Cabang
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="#" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- ID CABANG -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            ID Cabang
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Contoh : CBG-001">

                    </div>

                    <!-- KABUPATEN / KECAMATAN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Kabupaten / Kecamatan
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih kecamatan
                            </option>

                            <option>
                                Batam Kota
                            </option>

                            <option>
                                Bengkong
                            </option>

                            <option>
                                Batu Aji
                            </option>

                            <option>
                                Batu Ampar
                            </option>

                            <option>
                                Belakang Padang
                            </option>

                            <option>
                                Bulang
                            </option>

                            <option>
                                Galang
                            </option>

                            <option>
                                Lubuk Baja
                            </option>

                            <option>
                                Nongsa
                            </option>

                            <option>
                                Sagulung
                            </option>

                            <option>
                                Sei Beduk
                            </option>

                            <option>
                                Sekupang
                            </option>

                        </select>

                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Status
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih status
                            </option>

                            <option>
                                AKTIF
                            </option>

                            <option>
                                NONAKTIF
                            </option>

                            <option>
                                KURANG AKTIF
                            </option>

                        </select>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <!-- BACK -->
                    <a href="{{ url('/organisasi/cabang') }}"
                       class="btn back-btn">

                        Kembali

                    </a>

                    <!-- SAVE -->
                    <button type="submit"
                            class="btn save-btn">

                        Simpan Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection