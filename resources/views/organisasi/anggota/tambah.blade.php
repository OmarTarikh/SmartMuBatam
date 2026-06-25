{{-- ========================================
     resources/views/organisasi/anggota/tambah.blade.php
======================================== --}}

@extends('layouts.app')

@section('title', 'Manajemen Organisasi > Anggota > Tambah')

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

            <form action="{{ route('anggota.store') }}" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NIK -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            NIK
                        </label>

                        <input
                            type="text"
                            name="nik"
                            value="{{ old('nik') }}"
                            class="form-control custom-input @error('nik') is-invalid @enderror"
                            placeholder="Masukkan NIK">

                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <!-- NAMA -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            class="form-control custom-input @error('nama') is-invalid @enderror"
                            placeholder="Masukkan nama">

                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <!-- JENIS KELAMIN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Jenis Kelamin
                        </label>

                        <select
                            name="jenis_kelamin"
                            class="form-select custom-input @error('jenis_kelamin') is-invalid @enderror">

                            <option value="">
                                Pilih jenis kelamin
                            </option>

                            <option value="L"
                                {{ old('jenis_kelamin')=='L' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="P"
                                {{ old('jenis_kelamin')=='P' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>

                        @error('jenis_kelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            class="form-control custom-input @error('tanggal_lahir') is-invalid @enderror">

                        @error('tanggal_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <!-- ALAMAT -->
                    <div class="col-md-12">

                        <label class="custom-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="form-control custom-input @error('alamat') is-invalid @enderror"
                            placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>

                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                    <!-- CABANG -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Cabang
                        </label>

                        <select
                            name="cabang_id"
                            id="cabang"
                            class="form-select custom-input @error('cabang_id') is-invalid @enderror">

                            <option value="">
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

                    <!-- RANTING -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Ranting
                        </label>

                        <select
                            name="ranting_id"
                            id="ranting"
                            class="form-select custom-input @error('ranting_id') is-invalid @enderror">

                            <option value="">
                                Pilih ranting
                            </option>

                        </select>

                        @error('ranting_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <!-- PEKERJAAN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Pekerjaan
                        </label>

                        <input
                            type="text"
                            name="pekerjaan"
                            value="{{ old('pekerjaan') }}"
                            class="form-control custom-input @error('pekerjaan') is-invalid @enderror"
                            placeholder="Masukkan pekerjaan">

                        @error('pekerjaan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- PENDIDIKAN -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Pendidikan
                        </label>

                        <select
                            name="pendidikan"
                            class="form-select custom-input @error('pendidikan') is-invalid @enderror">

                            <option value="">
                                Pilih pendidikan
                            </option>

                            <option value="SMA" {{ old('pendidikan')=='SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="D3" {{ old('pendidikan')=='D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('pendidikan')=='S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('pendidikan')=='S2' ? 'selected' : '' }}>S2</option>

                        </select>

                        @error('pendidikan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select custom-input @error('status') is-invalid @enderror">

                            <option value="">
                                Pilih status
                            </option>

                            <option value="AKTIF" {{ old('status')=='AKTIF' ? 'selected' : '' }}>
                                AKTIF
                            </option>

                            <option value="VAKUM" {{ old('status')=='VAKUM' ? 'selected' : '' }}>
                                VAKUM
                            </option>

                            <option value="KURANG AKTIF" {{ old('status')=='KURANG AKTIF' ? 'selected' : '' }}>
                                KURANG AKTIF
                            </option>

                        </select>

                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const cabang = document.getElementById('cabang');
    const ranting = document.getElementById('ranting');

    cabang.addEventListener('change', function () {

        let id = this.value;

        ranting.innerHTML = '<option value="">Memuat...</option>';

        fetch('/organisasi/anggota/get-ranting/' + id)

            .then(response => response.json())

            .then(data => {

                ranting.innerHTML =
                    '<option value="">Pilih ranting</option>';

                data.forEach(item => {

                    ranting.innerHTML +=
                        `<option value="${item.id}">
                            ${item.nama_ranting}
                        </option>`;

                });

            })

            .catch(error => {

                console.error(error);

            });

    });

});

</script>

@endpush
@endsection