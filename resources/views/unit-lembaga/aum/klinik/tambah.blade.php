@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah AUM Klinik
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="#" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NAMA AUM -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama Klinik
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan nama klinik">

                    </div>

                    <!-- KAPASITAS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Kapasitas
                        </label>

                        <input type="number"
                               class="form-control custom-input"
                               placeholder="Masukkan kapasitas pasien">

                    </div>

                    <!-- JUMLAH PASIEN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jumlah Pasien
                        </label>

                        <input type="number"
                               class="form-control custom-input"
                               placeholder="Masukkan jumlah pasien">

                    </div>

                    <!-- JUMLAH DOKTER -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jumlah Dokter
                        </label>

                        <input type="number"
                               class="form-control custom-input"
                               placeholder="Masukkan jumlah dokter">

                    </div>

                    <!-- TAHUN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Tahun
                        </label>

                        <input type="number"
                               class="form-control custom-input"
                               placeholder="2026">

                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Status Perizinan
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih status
                            </option>

                            <option>
                                AKTIF
                            </option>

                            <option>
                                TIDAK AKTIF
                            </option>

                            <option>
                                PROSES IZIN
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

                    <!-- ALAMAT -->
                    <div class="col-md-12">

                        <label class="custom-label">
                            Alamat
                        </label>

                        <textarea class="form-control custom-input"
                                  rows="4"
                                  placeholder="Masukkan alamat klinik"></textarea>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ url('/unit-lembaga/aum/klinik') }}"
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