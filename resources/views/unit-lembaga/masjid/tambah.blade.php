@extends('layouts.app')

@section('title', 'Manajemen Unit Lembaga > Masjid > Tambah')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Masjid
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="#" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NAMA -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama Masjid
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan nama masjid">

                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Status Legalitas
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih status legalitas
                            </option>

                            <option>
                                SERTIFIKAT
                            </option>

                            <option>
                                PROSES
                            </option>

                            <option>
                                BELUM
                            </option>

                        </select>

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
                                Sekupang
                            </option>

                        </select>

                    </div>

                    <!-- RANTING -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Ranting
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih ranting
                            </option>

                            <option>
                                Tiban
                            </option>

                            <option>
                                Tanjung Riau
                            </option>

                        </select>

                    </div>

                    <!-- ALAMAT -->
                    <div class="col-md-12">

                        <label class="custom-label">
                            Alamat
                        </label>

                        <textarea rows="4"
                                  class="form-control custom-input"
                                  placeholder="Masukkan alamat masjid"></textarea>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ url('/unit-lembaga/masjid') }}"
                       class="btn back-btn">

                        Kembali

                    </a>

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