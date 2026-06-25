@extends('layouts.app')

@section('title', 'Manajemen Organisasi > Cabang > Tambah')

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

        <form action="{{ route('cabang.store') }}"
              method="POST">

            @csrf

            <div class="row g-4">

                <!-- ID CABANG -->
                <div class="col-md-6">

                    <label class="custom-label">
                        ID Cabang
                    </label>

                    <input
                        type="text"
                        class="form-control custom-input"
                        value="Auto Generate"
                        readonly>

                </div>


                <!-- NAMA CABANG -->
                <div class="col-md-6">

                    <label class="custom-label">
                        Nama Cabang
                    </label>

                    <input
                        type="text"
                        name="nama_cabang"
                        class="form-control custom-input"
                        placeholder="Masukkan nama cabang..."
                        value="{{ old('nama_cabang') }}"
                        required>

                    @error('nama_cabang')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <!-- STATUS -->
                <div class="col-md-6">

                    <label class="custom-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select custom-input"
                        required>

                        <option selected disabled>
                            Pilih status
                        </option>

                        <option value="aktif">
                            AKTIF
                        </option>

                        <option value="kurang aktif">
                            KURANG AKTIF
                        </option>

                        <option value="vakum">
                            VAKUM
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>
            </div>

            <!-- BUTTON -->
            <div class="d-flex justify-content-end gap-3 mt-5">

                <!-- BACK -->
                <a href="{{ route('cabang.index') }}"
                   class="btn back-btn">

                    Kembali

                </a>

                <!-- SAVE -->
                <button
                    type="submit"
                    class="btn save-btn">

                    Simpan Data

                </button>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
