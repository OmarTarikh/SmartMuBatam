@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- FORM CARD -->
    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Ranting
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="#" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- ID RANTING -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            ID Ranting
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Contoh : RTG-001">

                    </div>

                    <!-- NAMA RANTING -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama Ranting
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan nama ranting">

                    </div>

                    <!-- CABANG -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Cabang
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih cabang
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
                                Nongsa
                            </option>

                            <option>
                                Sagulung
                            </option>

                            <option>
                                Sekupang
                            </option>

                            <option>
                                Sei Beduk
                            </option>

                            <option>
                                Lubuk Baja
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
                    <a href="{{ url('/organisasi/ranting') }}"
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