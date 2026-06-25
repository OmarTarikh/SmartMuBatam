@extends('layouts.app')

@section('title', 'Manajemen Unit Lembaga > AUM > Klinik > Tambah')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <div class="form-card-header">

            <h5>
                Form Tambah AUM Klinik
            </h5>

        </div>

        <div class="form-card-body">

            <form action="{{ route('aum.store') }}" method="POST">

                @csrf

                <input
                    type="hidden"
                    name="jenis"
                    value="klinik">

                <div class="row g-4">

                    <!-- NAMA -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Nama Klinik

                        </label>

                        <input
                            type="text"
                            name="nama_aum"
                            value="{{ old('nama_aum') }}"
                            class="form-control custom-input"
                            placeholder="Masukkan nama klinik">

                    </div>

                    <!-- KAPASITAS -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Kapasitas

                        </label>

                        <input
                            type="number"
                            name="kapasitas"
                            value="{{ old('kapasitas') }}"
                            class="form-control custom-input"
                            placeholder="Masukkan kapasitas">

                    </div>

                    <!-- JUMLAH PASIEN -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Jumlah Pasien

                        </label>

                        <input
                            type="number"
                            name="jumlah_pasien"
                            value="{{ old('jumlah_pasien') }}"
                            class="form-control custom-input">

                    </div>

                    <!-- JUMLAH DOKTER -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Jumlah Dokter

                        </label>

                        <input
                            type="number"
                            name="jumlah_dokter"
                            value="{{ old('jumlah_dokter') }}"
                            class="form-control custom-input">

                    </div>

                    <!-- TAHUN -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Tahun Berdiri

                        </label>

                        <select
                            name="tahun"
                            class="form-select custom-input">

                            <option value="">
                                Pilih Tahun
                            </option>

                            @for($i = date('Y'); $i >= 1950; $i--)

                                <option
                                    value="{{ $i }}"
                                    {{ old('tahun') == $i ? 'selected' : '' }}>

                                    {{ $i }}

                                </option>

                            @endfor

                        </select>                    
                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Status Perizinan

                        </label>

                        <select
                            name="status_perizinan"
                            class="form-select custom-input">

                            <option value="">

                                Pilih Status

                            </option>

                            <option value="aktif"
                                {{ old('status_perizinan')=='aktif'?'selected':'' }}>

                                AKTIF

                            </option>

                            <option value="tidak aktif"
                                {{ old('status_perizinan')=='tidak_aktif'?'selected':'' }}>

                                TIDAK AKTIF

                            </option>

                            <option value="proses izin"
                                {{ old('status_perizinan')=='proses_izin'?'selected':'' }}>

                                PROSES IZIN

                            </option>

                        </select>

                    </div>

                    <!-- CABANG -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Cabang

                        </label>

                        <select
                            id="cabang"
                            name="cabang_id"
                            class="form-select custom-input">

                            <option value="">

                                Pilih Cabang

                            </option>

                            @foreach($cabangs as $cabang)

                                <option
                                    value="{{ $cabang->id }}"
                                    {{ old('cabang_id')==$cabang->id?'selected':'' }}>

                                    {{ $cabang->nama_cabang }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- RANTING -->
                    <div class="col-md-6">

                        <label class="custom-label">

                            Ranting

                        </label>

                        <select
                            id="ranting"
                            name="ranting_id"
                            class="form-select custom-input">

                            <option value="">

                                Pilih Ranting

                            </option>

                        </select>

                    </div>

                    <!-- ALAMAT -->
                    <div class="col-md-12">

                        <label class="custom-label">

                            Alamat

                        </label>

                        <textarea
                            rows="4"
                            name="alamat"
                            class="form-control custom-input"
                            placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a
                        href="{{ route('aum.klinik') }}"
                        class="btn back-btn">

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn save-btn">

                        Simpan 

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded',function(){

    const cabang=document.getElementById('cabang');

    const ranting=document.getElementById('ranting');

    cabang.addEventListener('change',function(){

        let id=this.value;

        ranting.innerHTML='<option>Memuat...</option>';

        fetch('/unit-lembaga/aum/get-ranting/'+id)

        .then(res=>res.json())

        .then(data=>{

            ranting.innerHTML='<option value="">Pilih Ranting</option>';

            data.forEach(item=>{

                ranting.innerHTML+=`
                    <option value="${item.id}">
                        ${item.nama_ranting}
                    </option>
                `;

            });

        });

    });

});

</script>

@endpush