@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <div class="form-card-header">

            <h5>
                Form Tambah AUM Sekolah
            </h5>

        </div>

        <div class="form-card-body">

            <form>

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama AUM
                        </label>

                        <input type="text"
                               class="form-control custom-input"
                               placeholder="Masukkan nama sekolah">

                    </div>

                    <div class="col-md-6">

                        <label class="custom-label">
                            Akreditasi
                        </label>

                        <select class="form-select custom-input">

                            <option>A</option>
                            <option>B</option>
                            <option>C</option>

                        </select>

                    </div>

                    <div class="col-md-6">

                        <label class="custom-label">
                            Jumlah Siswa
                        </label>

                        <input type="number"
                               class="form-control custom-input">

                    </div>

                    <div class="col-md-6">

                        <label class="custom-label">
                            Jumlah Guru
                        </label>

                        <input type="number"
                               class="form-control custom-input">

                    </div>

                    <div class="col-md-6">

                        <label class="custom-label">
                            Tahun
                        </label>

                        <input type="number"
                               class="form-control custom-input">

                    </div>

                    <div class="col-md-6">

                        <label class="custom-label">
                            Status Perizinan
                        </label>

                        <select class="form-select custom-input">

                            <option>AKTIF</option>
                            <option>TIDAK AKTIF</option>
                            <option>PROSES IZIN</option>

                        </select>

                    </div>

                    <div class="col-md-12">

                        <label class="custom-label">
                            Alamat
                        </label>

                        <textarea class="form-control custom-input"
                                  rows="4"></textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a href="{{ url('/unit-lembaga/aum/sekolah') }}"
                       class="btn back-btn">

                        Kembali

                    </a>

                    <button class="btn save-btn">

                        Simpan Data

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection