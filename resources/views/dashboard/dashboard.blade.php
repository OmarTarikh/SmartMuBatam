@extends('layouts.app')

@section('content')
<!-- CARD SECTION -->
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-2">

    <!-- ANGGOTA -->
    <div class="col">
        <a href="{{ url('/organisasi/anggota') }}" class="card-link">
            <div class="card stat-card border-green">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-title text-success">JUMLAH ANGGOTA</p>
                        <h3 class="stat-value">578</h3>
                    </div>
                    <iconify-icon icon="mdi:account-group" class="stat-icon"></iconify-icon>
                </div>
            </div>
        </a>
    </div>

    <!-- AUM -->
    <div class="col">
        <a href="{{ url('/unit-lembaga/aum/sekolah') }}" class="card-link">
            <div class="card stat-card border-blue">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-title text-primary">JUMLAH AUM</p>
                        <h3 class="stat-value">63</h3>
                    </div>
                    <iconify-icon icon="mdi:handshake" class="stat-icon"></iconify-icon>
                </div>
            </div>
        </a>
    </div>

    <!-- ASSET -->
    <div class="col">
        <a href="{{ url('/keuangan') }}" class="card-link">
            <div class="card stat-card border-yellow">
                <div>
                    <p class="stat-title text-warning">TOTAL ASSET</p>
                    <h3 class="stat-value">Rp72 Juta</h3>
                </div>
            </div>
        </a>
    </div>

    <!-- MASJID -->
    <div class="col">
        <a href="{{ url('/unit-lembaga/masjid') }}" class="card-link">
            <div class="card stat-card border-cyan">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-title text-info">JUMLAH MASJID</p>
                        <h3 class="stat-value">28</h3>
                    </div>
                    <iconify-icon icon="mdi:mosque" class="stat-icon"></iconify-icon>
                </div>
            </div>
        </a>
    </div>

    <!-- SEKOLAH -->
    <div class="col">
        <a href="{{ url('/unit-lembaga/aum/sekolah') }}" class="card-link">
            <div class="card stat-card border-red">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="stat-title text-danger">JUMLAH SEKOLAH</p>
                        <h3 class="stat-value">37</h3>
                    </div>
                    <iconify-icon icon="mdi:school" class="stat-icon"></iconify-icon>
                </div>
            </div>
        </a>
    </div>

</div>

<!-- SECCOND SECTION -->
<div class="row g-2 mt-2">

    <!-- LINE CHART -->
    <div class="col-lg-5">
        <div class="card chart-card"
             data-bs-toggle="modal"
             data-bs-target="#growthModal">

            <!-- HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>GRAFIK PERTUMBUHAN WARGA</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <div class="card-body text-center">

                <canvas id="lineChart"></canvas>

                <div class="chart-legend-custom mt-3">

                    <div class="legend-item green">
                        <span class="legend-dot"></span>
                        <span>BERTAMBAH</span>
                    </div>

                    <div class="legend-item red">
                        <span class="legend-dot"></span>
                        <span>BERKURANG</span>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- DONUT CHART -->
    <div class="col-lg-2">
        <div class="card chart-card"
             data-bs-toggle="modal"
             data-bs-target="#guruMuridModal">

            <!-- HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>RASIO GURU vs MURID</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <div class="card-body text-center">

                <div class="donut-wrapper mx-auto mt-3">
                    <canvas id="donutChart1"></canvas>
                </div>

                <div class="chart-legend-custom mt-5">

                    <div class="legend-item blue">
                        <span class="legend-dot"></span>
                        <span>GURU</span>
                    </div>

                    <div class="legend-item green">
                        <span class="legend-dot"></span>
                        <span>MURID</span>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- ACTIVITY CARD -->
    <div class="col-lg-3">
        <div class="card chart-card activity-card-wrapper"
             data-bs-toggle="modal"
             data-bs-target="#activityModal">

            <!-- HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>KEGIATAN TERDEKAT</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <!-- BODY -->
            <div class="card-body activity-body small">

                <!-- ITEM -->
                <div class="activity-row">

                    <div class="activity-date">
                        Sep
                    </div>

                    <div class="activity-content">

                        <div class="activity-heading">
                            GOTONG ROYONG
                        </div>

                        <div class="activity-box red">

                            <div>
                                12 Okt 2025
                            </div>

                            <div>
                                07.00 - 10.00
                            </div>

                            <div>
                                Masjid
                            </div>

                        </div>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="activity-row">

                    <div class="activity-date">
                        Jan
                    </div>

                    <div class="activity-content">

                        <div class="activity-heading">
                            RAPAT
                        </div>

                        <div class="activity-box blue">

                            <div>
                                12 Okt 2025
                            </div>

                            <div>
                                07.00 - 10.00
                            </div>

                            <div>
                                Hotel Aston
                            </div>

                        </div>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="activity-row">

                    <div class="activity-date">
                        Okt
                    </div>

                    <div class="activity-content">

                        <div class="activity-heading">
                            PENGAJIAN
                        </div>

                        <div class="activity-box green">

                            <div>
                                12 Okt 2025
                            </div>

                            <div>
                                07.00 - 10.00
                            </div>

                            <div>
                                Masjid Agung
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- DONUT CHART 2 -->
    <div class="col-lg-2">
        <div class="card chart-card"
             data-bs-toggle="modal"
             data-bs-target="#keaktifanModal">

            <!-- HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>RASIO KEAKTIFAN</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <div class="card-body text-center">

                <div class="donut-wrapper mx-auto mt-3">
                    <canvas id="donutChart2"></canvas>
                </div>

                <!-- CUSTOM LEGEND -->
                <div class="chart-legend-custom-2 mt-5">

                    <div class="legend-top">

                        <div class="legend-item green">
                            <span class="legend-dot"></span>
                            <span>AKTIF</span>
                        </div>

                        <div class="legend-item blue">
                            <span class="legend-dot"></span>
                            <span>VAKUM</span>
                        </div>

                    </div>

                    <div class="legend-bottom">

                        <div class="legend-item red">
                            <span class="legend-dot"></span>
                            <span>TIDAK AKTIF</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<!-- THIRD SECTION -->
<div class="row g-2 mt-2 third-row">

    <!-- LINE CHART 2 -->
    <div class="col-lg-5">
        <div class="card chart-card">

            <!-- HEADER -->
            <div class="card-header custom-header d-flex justify-content-between align-items-center">
                <span>GRAFIK JUMLAH SISWA PERTAHUN</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <!-- BODY -->
            <div class="card-body text-center">
                <canvas id="studentChart"></canvas>
            </div>

            <!-- LEGEND -->
            <div class="chart-legend-custom mb-3">

                <div class="legend-item green">
                    <span class="legend-dot"></span>
                    <span>SMAN 1</span>
                </div>

                <div class="legend-item blue">
                    <span class="legend-dot"></span>
                    <span>SMAN 2</span>
                </div>

                <div class="legend-item cyan">
                    <span class="legend-dot"></span>
                    <span>SMKN 1</span>
                </div>

                <div class="legend-item red">
                    <span class="legend-dot"></span>
                    <span>SMKN 2</span>
                </div>

            </div>

        </div>
    </div>

    <!-- PROGRESS CHART -->
    <div class="col-lg-2">
        <div class="card chart-card">

            <!-- HEADER -->
            <div class="card-header custom-header d-flex justify-content-between align-items-center">
                <span>PERSENTASE PENCAPAIAN PROGRAM KERJA</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <!-- BODY -->
            <div class="card-body d-flex justify-content-center align-items-center">

                <div class="progress-wrapper">
                    <div class="progress-wrapper mx-auto">

                        <canvas id="progressChart"></canvas>

                        <!-- CENTER TEXT -->
                        <div class="progress-center-text">
                            <h4>80%</h4>
                            <span>PROGRESS</span>
                        </div>

                    </div>                
                </div>

            </div>

        </div>
    </div>

    <!-- INCOME VS EXPENSE -->
    <div class="col-lg-5">
        <div class="card chart-card">

            <!-- HEADER -->
            <div class="card-header custom-header d-flex justify-content-between align-items-center">
                <span>GRAFIK PEMASUKAN VS PENGELUARAN ASSET</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <!-- BODY -->
            <div class="card-body text-center">
                <canvas id="financeChart"></canvas>
            </div>

            <!-- LEGEND -->
            <div class="chart-legend-custom mb-3">

                <div class="legend-item green">
                    <span class="legend-dot"></span>
                    <span>PEMASUKAN</span>
                </div>

                <div class="legend-item red">
                    <span class="legend-dot"></span>
                    <span>PENGELUARAN</span>
                </div>

            </div>

        </div>
    </div>

</div>

<!-- FOURTH SECTION -->
<div class="row g-2 mt-2 fourth-row">

    <!-- BAR CHART -->
    <div class="col-lg-6">
        <div class="card chart-card">

            <div class="card-header custom-header d-flex justify-content-between align-items-center">
                <span>JUMLAH ANGGOTA PER CABANG</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <div class="card-body">
                <canvas id="barChart"></canvas>
            </div>

        </div>
    </div>

<!-- HISTOGRAM -->
<div class="col-lg-6">
    <div class="card chart-card">

        <!-- HEADER -->
        <div class="card-header custom-header d-flex justify-content-between align-items-center">
            <span>DISTRIBUSI UMUR ANGGOTA</span>
            <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
        </div>

        <!-- BODY -->
        <div class="card-body text-center">
            <canvas id="histogramChart"></canvas>
        </div>

        <!-- LEGEND -->
        <div class="chart-legend-custom mb-3">

            <div class="legend-item green">
                <span class="legend-dot"></span>
                <span>REMAJA</span>
            </div>

            <div class="legend-item cyan">
                <span class="legend-dot"></span>
                <span>DEWASA</span>
            </div>

            <div class="legend-item red">
                <span class="legend-dot"></span>
                <span>LANSIA</span>
            </div>

        </div>

    </div>
</div>

<!-- FIFTH SECTION -->
<div class="row g-2 mt-2">

    <!-- SCATTER -->
    <div class="col-lg-6">
        <div class="card chart-card">

            <!-- HEADER -->
            <div class="card-header custom-header d-flex justify-content-between align-items-center">
                <span>UMUR vs KEAKTIFAN</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <!-- BODY -->
            <div class="card-body text-center">
                <canvas id="scatterChart"></canvas>
            </div>

            <!-- LEGEND -->
            <div class="chart-legend-custom mb-3">

                <div class="legend-item green">
                    <span class="legend-dot"></span>
                    <span>AKTIF</span>
                </div>

                <div class="legend-item cyan">
                    <span class="legend-dot"></span>
                    <span>KURANG AKTIF</span>
                </div>

                <div class="legend-item red">
                    <span class="legend-dot"></span>
                    <span>TIDAK AKTIF</span>
                </div>

            </div>

        </div>
    </div>

    <!-- AREA -->
    <div class="col-lg-6">
        <div class="card chart-card">

            <!-- HEADER -->
            <div class="card-header custom-header d-flex justify-content-between align-items-center">
                <span>PERTUMBUHAN KEGIATAN</span>
                <iconify-icon icon="mdi:dots-vertical" style="color:#ccc;"></iconify-icon>
            </div>

            <!-- BODY -->
            <div class="card-body text-center">
                <canvas id="areaChart"></canvas>
            </div>

            <!-- LEGEND -->
            <div class="chart-legend-custom mb-3">

                <div class="legend-item green">
                    <span class="legend-dot"></span>
                    <span>BERJALAN</span>
                </div>

                <div class="legend-item cyan">
                    <span class="legend-dot"></span>
                    <span>AKAN DATANG</span>
                </div>

                <div class="legend-item red">
                    <span class="legend-dot"></span>
                    <span>SELESAI</span>
                </div>

            </div>

        </div>
    </div>
</div>

@include('dashboard.modals')

@endsection