@extends('layouts.app')

@section('title', 'Manajemen Organisasi > Ranting > Tambah')

@section('content')

<div class="container-fluid py-4">

```
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

        <form action="{{ route('ranting.store') }}" method="POST">

            @csrf

            <div class="row g-4">

                <!-- ID RANTING -->
                <div class="col-md-6">

                    <label class="custom-label">
                        ID Ranting
                    </label>

                    <input
                        type="text"
                        class="form-control custom-input"
                        value="Auto Generate"
                        readonly>

                </div>

                <!-- NAMA RANTING -->
                <div class="col-md-6">

                    <label class="custom-label">
                        Nama Ranting
                    </label>

                    <input
                        type="text"
                        name="nama_ranting"
                        class="form-control custom-input"
                        placeholder="Masukkan nama ranting"
                        value="{{ old('nama_ranting') }}"
                        required>

                    @error('nama_ranting')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <!-- CABANG -->
                <div class="col-md-6">

                    <label class="custom-label">
                        Cabang
                    </label>

                    <select
                        name="cabang_id"
                        class="form-select custom-input"
                        required>

                        <option selected disabled>
                            Pilih cabang
                        </option>

                        @foreach($cabangs as $cabang)

                            <option
                                value="{{ $cabang->id }}"
                                {{ old('cabang_id') == $cabang->id ? 'selected' : '' }}>

                                {{ $cabang->nama_cabang }}

                            </option>

                        @endforeach

                    </select>

                    @error('cabang_id')
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

                        <option value="AKTIF"
                            {{ old('status') == 'AKTIF' ? 'selected' : '' }}>
                            AKTIF
                        </option>

                        <option value="VAKUM"
                            {{ old('status') == 'VAKUM' ? 'selected' : '' }}>
                            VAKUM
                        </option>

                        <option value="KURANG AKTIF"
                            {{ old('status') == 'KURANG AKTIF' ? 'selected' : '' }}>
                            KURANG AKTIF
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
                <a href="{{ route('ranting.index') }}"
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
```

</div>

@endsection
