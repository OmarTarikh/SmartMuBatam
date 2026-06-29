@extends('layouts.app')

@section('title', 'Program Kerja & Agenda > Tambah')

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

            <form
                action="{{ route('kegiatan.store') }}"
                method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NAMA KEGIATAN -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Nama Kegiatan

                        </label>

                        <input
                            type="text"
                            name="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}"
                            class="form-control custom-input @error('nama_kegiatan') is-invalid @enderror"
                            placeholder="Masukkan nama kegiatan"
                            required>

                        @error('nama_kegiatan')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- CABANG -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Cabang

                        </label>

                        <select
                            name="cabang_id"
                            class="form-select custom-input @error('cabang_id') is-invalid @enderror"
                            required>

                            <option value="">

                                Pilih Cabang

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

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- JENIS -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Jenis Kegiatan

                        </label>

                        <select
                            name="jenis"
                            class="form-select custom-input @error('jenis') is-invalid @enderror"
                            required>

                            <option value="">

                                Pilih Jenis

                            </option>

                            <option
                                value="agenda"
                                {{ old('jenis')=='agenda' ? 'selected' : '' }}>

                                Agenda

                            </option>

                            <option
                                value="program_kerja"
                                {{ old('jenis')=='program_kerja' ? 'selected' : '' }}>

                                Program Kerja

                            </option>

                        </select>

                        @error('jenis')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- PROGRESS -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Progress (%)

                        </label>

                        <input
                            type="number"
                            name="progres_persen"
                            value="{{ old('progres_persen',0) }}"
                            min="0"
                            max="100"
                            class="form-control custom-input @error('progres_persen') is-invalid @enderror">

                        @error('progres_persen')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                                        <!-- TANGGAL MULAI -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Tanggal Mulai

                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="{{ old('tanggal_mulai') }}"
                            class="form-control custom-input @error('tanggal_mulai') is-invalid @enderror"
                            required>

                        @error('tanggal_mulai')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- TANGGAL SELESAI -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Tanggal Selesai

                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            value="{{ old('tanggal_selesai') }}"
                            class="form-control custom-input @error('tanggal_selesai') is-invalid @enderror"
                            required>

                        @error('tanggal_selesai')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- TARGET -->
                    <div class="col-md-12">

                        <label class="custom-label">

                            Target

                        </label>

                        <input
                            type="text"
                            name="target"
                            value="{{ old('target') }}"
                            class="form-control custom-input @error('target') is-invalid @enderror"
                            placeholder="Contoh : 100 Peserta / Seluruh Pengurus Cabang">

                        @error('target')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- LOKASI -->
                    <div class="col-md-12">

                        <label class="custom-label">

                            Lokasi

                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            value="{{ old('lokasi') }}"
                            class="form-control custom-input @error('lokasi') is-invalid @enderror"
                            placeholder="Masukkan lokasi kegiatan">

                        @error('lokasi')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="col-md-12">

                        <label class="custom-label">

                            Deskripsi

                        </label>

                        <textarea
                            rows="5"
                            name="deskripsi"
                            class="form-control custom-input @error('deskripsi') is-invalid @enderror"
                            placeholder="Masukkan deskripsi kegiatan">{{ old('deskripsi') }}</textarea>

                        @error('deskripsi')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a
                        href="{{ route('kegiatan') }}"
                        class="btn back-btn">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn save-btn">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection