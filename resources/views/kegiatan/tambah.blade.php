@extends('layouts.app')
@section('title', 'Program Kerja & Agenda > Tambah Kegiatan')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Kegiatan
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
                            Nama Kegiatan
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan nama kegiatan">

                    </div>

                    <!-- JENIS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jenis
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih jenis
                            </option>

                            <option>agenda</option>
                            <option>program_kerja</option>

                        </select>

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Deskripsi
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan deskripsi">

                    </div>

                    <!-- TARGET -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Target
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan target">

                    </div>

                    <!-- PROGRES -->
                    <div class="col-md-4">

                        <label class="custom-label">
                            Progress Persen
                        </label>

                        <input type="number"
                               class="form-control custom-input"
                               placeholder="0 - 100">

                    </div>

                    <!-- TGL MULAI -->
                    <div class="col-md-4">

                        <label class="custom-label">
                            Tanggal Mulai
                        </label>

                        <input type="date"
                               class="form-control custom-input">

                    </div>

                    <!-- TGL SELESAI -->
                    <div class="col-md-4">

                        <label class="custom-label">
                            Tanggal Selesai
                        </label>

                        <input type="date"
                               class="form-control custom-input">

                    </div>

                    <!-- LOKASI -->
                    <div class="col-md-12">

                        <label class="custom-label">
                            Lokasi
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan lokasi">

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ url('/kegiatan') }}"
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