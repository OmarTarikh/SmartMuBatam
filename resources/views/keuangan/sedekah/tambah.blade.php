@extends('layouts.app')

@section('title', 'Keuangan > Sedekah > Tambah')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>

                Form Tambah Data Sedekah

            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form
                action="{{ route('keuangan.store') }}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    name="jenis"
                    value="sedekah">

                <div class="row g-4">

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

                    <!-- MASJID -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Masjid

                        </label>

                        <select
                            name="masjid_id"
                            class="form-select custom-input @error('masjid_id') is-invalid @enderror"
                            required>

                            <option value="">

                                Pilih Masjid

                            </option>

                            @foreach($masjids as $masjid)

                                <option
                                    value="{{ $masjid->id }}"
                                    {{ old('masjid_id') == $masjid->id ? 'selected' : '' }}>

                                    {{ $masjid->nama_masjid }}

                                </option>

                            @endforeach

                        </select>

                        @error('masjid_id')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- JUMLAH -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Jumlah

                        </label>

                        <div class="input-group">

                            <span class="input-group-text">

                                Rp

                            </span>

                            <input
                                type="text"
                                id="jumlah_view"
                                class="form-control custom-input"
                                placeholder="0">

                            <input
                                type="hidden"
                                id="jumlah"
                                name="jumlah">

                        </div>

                    </div>

                    <!-- TANGGAL -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Tanggal

                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            value="{{ old('tanggal') }}"
                            class="form-control custom-input @error('tanggal') is-invalid @enderror">

                        @error('tanggal')

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
                            placeholder="Masukkan lokasi">

                        @error('lokasi')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- KETERANGAN -->
                    <div class="col-md-12">

                        <label class="custom-label">

                            Keterangan

                        </label>

                        <textarea
                            rows="4"
                            name="keterangan"
                            class="form-control custom-input @error('keterangan') is-invalid @enderror"
                            placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>

                        @error('keterangan')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                                    <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a
                        href="{{ route('keuangan.sedekah') }}"
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

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function(){

    const inputView = document.getElementById('jumlah_view');

    const inputReal = document.getElementById('jumlah');

    inputView.addEventListener('input', function(){

        // Ambil hanya angka
        let angka = this.value.replace(/\D/g,'');

        // Simpan ke input hidden
        inputReal.value = angka;

        // Format ribuan
        this.value = angka.replace(/\B(?=(\d{3})+(?!\d))/g,".");

    });

});

</script>

@endpush

@endsection