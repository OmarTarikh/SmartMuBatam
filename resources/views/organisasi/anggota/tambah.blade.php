{{-- ========================================
     resources/views/organisasi/anggota/tambah.blade.php
======================================== --}}

@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Anggota
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="#" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NIK -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            NIK
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan NIK">

                    </div>

                    <!-- NAMA -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan nama">

                    </div>

                    <!-- JENIS KELAMIN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jenis Kelamin
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih jenis kelamin
                            </option>

                            <option>
                                Laki-laki
                            </option>

                            <option>
                                Perempuan
                            </option>

                        </select>

                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Tanggal Lahir
                        </label>

                        <input type="date"
                               class="form-control custom-input">

                    </div>

                    <!-- ALAMAT -->
                    <div class="col-md-12">

                        <label class="custom-label">
                            Alamat
                        </label>

                        <textarea class="form-control custom-input"
                                  rows="4"
                                  placeholder="Masukkan alamat"></textarea>

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

                            <option>
                                Nongsa
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
                                Tanjung Riau
                            </option>

                            <option>
                                Tiban
                            </option>

                            <option>
                                Patam Lestari
                            </option>

                        </select>

                    </div>

                    <!-- PEKERJAAN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Pekerjaan
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan pekerjaan">

                    </div>

                    <!-- PENDIDIKAN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Pendidikan
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih pendidikan
                            </option>

                            <option>SMA</option>
                            <option>D3</option>
                            <option>S1</option>
                            <option>S2</option>

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

                            <option>AKTIF</option>

                            <option>NONAKTIF</option>

                            <option>KURANG AKTIF</option>

                        </select>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ url('/organisasi/anggota') }}"
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