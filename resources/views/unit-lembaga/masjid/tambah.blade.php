@extends('layouts.app')

@section('title', 'Manajemen Unit Lembaga > Masjid > Tambah')

@section('content')

<div class="container-fluid py-4">

    <div class="form-card">

        <!-- HEADER -->
        <div class="form-card-header">

            <h5>
                Form Tambah Masjid
            </h5>

        </div>

        <!-- BODY -->
        <div class="form-card-body">

            <form action="{{ route('masjid.store') }}" method="POST">

                @csrf

                <div class="row g-4">

                    <!-- NAMA -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Nama Masjid
                        </label>

                        <input
                            type="text"
                            name="nama_masjid"
                            value="{{ old('nama_masjid') }}"
                            class="form-control custom-input"
                            placeholder="Masukkan nama masjid">

                    </div>

                    <!-- STATUS -->
                    <div class="col-md-6">

                        <label class="custom-label">
                            Status Legalitas
                        </label>

                        <select
                            name="status_legalitas"
                            class="form-select custom-input">

                            <option value="">
                                Pilih Status Legalitas
                            </option>

                            <option value="sertifikat"
                                {{ old('status_legalitas')=='sertifikat'?'selected':'' }}>
                                SERTIFIKAT
                            </option>

                            <option value="proses"
                                {{ old('status_legalitas')=='proses'?'selected':'' }}>
                                PROSES
                            </option>

                            <option value="belum"
                                {{ old('status_legalitas')=='belum'?'selected':'' }}>
                                BELUM
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
                            placeholder="Masukkan alamat masjid">{{ old('alamat') }}</textarea>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-3 mt-5">

                    <a
                        href="{{ route('masjid.index') }}"
                        class="btn back-btn">

                        Kembali

                    </a>

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


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded',function(){

    const cabang=document.getElementById('cabang');

    const ranting=document.getElementById('ranting');

    cabang.addEventListener('change',function(){

        let id=this.value;

        ranting.innerHTML='<option>Memuat...</option>';

        fetch('/unit-lembaga/masjid/get-ranting/'+id)

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