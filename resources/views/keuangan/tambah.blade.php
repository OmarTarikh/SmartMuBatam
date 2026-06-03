@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Keuangan
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="#" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- JENIS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jenis
                        </label>

                        <select class="form-select custom-input">

                            <option selected disabled>
                                Pilih jenis
                            </option>

                            <option>kas_masuk</option>
                            <option>kas_keluar</option>
                            <option>aset_tanah</option>
                            <option>aset_bangunan</option>

                        </select>

                    </div>

                    <!-- JUMLAH -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jumlah
                        </label>

                        <input type="number"
                               class="form-control custom-input"
                               placeholder="Masukkan jumlah">

                    </div>

                    <!-- KETERANGAN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Keterangan
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan keterangan">

                    </div>

                    <!-- LOKASI -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Lokasi
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan lokasi">

                    </div>

                    <!-- TANGGAL -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Tanggal
                        </label>

                        <input type="date"
                               class="form-control custom-input">

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ url('/keuangan') }}"
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