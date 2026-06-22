@extends('layouts.guest')

@section('content')

<div class="landing-page">

    <!-- ========================================
         NAVBAR
    ========================================= -->
    <nav class="landing-navbar" >

        <div class="container-fluid">

            <div class="navbar-wrapper">

                <!-- LOGO -->
                <div class="navbar-logo">

                    <iconify-icon icon="hugeicons:muhammad"></iconify-icon>

                    <span class="logo-text">
                        SMART<span class="normal-text">MuBatam</span>
                    </span>

                </div>

                <!-- MENU -->
                <div class="navbar-menu">

                    <a href="#beranda">Beranda</a>

                    <a href="#informasi">Informasi</a>

                    <a href="#profil">Profil</a>

                    <a href="#pencapaian">Pencapaian</a>

                                    <div class="dropdown">

                    <button
                        class="user-btn"
                        data-bs-toggle="dropdown">

                        <iconify-icon icon="mdi:account"></iconify-icon>

                    </button>

                    <div class="dropdown-menu dropdown-menu-end user-dropdown">

                        <a href="{{ url('/login') }}"
                           class="dropdown-item">

                            Login

                        </a>

                        <small>
                            Khusus untuk staff admin SMARTMuBatam
                        </small>

                    </div>

                </div>


                </div>

                <!-- USER -->
            </div>

        </div>

    </nav>


<!-- ========================================
     HERO
======================================== -->
<section class="hero-section" id="beranda">

    <div class="hero-content">

        <!-- LEFT -->
        <div class="hero-left">

            <h1 class="hero-title">
                <span class="smart-text">SMART</span>
                <span class="mubatam-text">MuBatam</span>
            </h1>

            <p>
                Sistem Manajemen Administrasi dan Informasi
                Terpadu untuk mengelola data organisasi
                Muhammadiyah Kota Batam
            </p>

        </div>

        <!-- RIGHT -->
        <div class="hero-right">

            <img
                src="{{ asset('assets/img/vektor-hijab.png') }}"
                alt="Wanita Hijab">

        </div>

    </div>

    <!-- WAVE -->
    <img
        src="{{ asset('assets/img/waves.svg') }}"
        class="hero-wave"
        alt="wave">

</section>

    <!-- ========================================
         BERITA CAROUSEL
    ========================================= -->
    <section class="news-section">

        <div class="container-fluid">

            <!-- BUBBLE TITLE -->
            <div class="news-title-bubble">
                  Berita Terkini  
            </div>

            <div class="news-wrapper">

                <!-- LEFT -->
                <button class="carousel-arrow" id="newsPrev">

                    <iconify-icon icon="mdi:chevron-left"></iconify-icon>

                </button>

                <!-- NEWS -->
                <div class="news-grid" id="newsCarousel">

                    <!-- CARD 1 -->
                    <div class="news-card">

                        <div class="news-label green">
                            Muhammadiyah Gelar Bakti Sosial dan Pemeriksaan
                            Kesehatan Gratis untuk Masyarakat
                        </div>

                        <img src="{{ asset('assets/img/bakti_sosial.jpg') }}">

                    </div>

                    <!-- CARD 2 -->
                    <div class="news-card">

                        <div class="news-label yellow">
                            Siswa Sekolah Muhammadiyah Raih Prestasi pada
                            Kompetisi Sains Nasional
                        </div>

                        <img src="{{ asset('assets/img/piala_siswa.jpg') }}">

                    </div>

                    <!-- CARD 3 -->
                    <div class="news-card">

                        <div class="news-label cyan">
                            Muhammadiyah Luncurkan Program Literasi Digital
                            untuk Generasi Muda
                        </div>

                        <img src="{{ asset('assets/img/siswa_komputer.jpg') }}">

                    </div>

                    <!-- CARD 4 -->
                    <div class="news-card">

                        <div class="news-label green">
                            Muhammadiyah Mengadakan Pelatihan Kader Muda
                        </div>

                        <img src="{{ asset('assets/img/bakti_sosial.jpg') }}">

                    </div>

                    <!-- CARD 5 -->
                    <div class="news-card">

                        <div class="news-label yellow">
                            Prestasi Sekolah Muhammadiyah Tingkat Nasional
                        </div>

                        <img src="{{ asset('assets/img/piala_siswa.jpg') }}">

                    </div>

                </div>

                <!-- RIGHT -->
                <button class="carousel-arrow" id="newsNext">

                    <iconify-icon icon="mdi:chevron-right"></iconify-icon>

                </button>

            </div>

        </div>

    </section>
</div>

<!-- ==================================================
     STRUKTUR ORGANISASI
=================================================== -->
<section class="struktur-wrapper">

    <div class="struktur-section">

        <!-- Hiasan -->
        <img src="{{ asset('assets/img/segitiga-kiri.svg') }}"
             class="triangle-left">

        <img src="{{ asset('assets/img/segitiga-kanan.svg') }}"
             class="triangle-right">

        <h2 class="struktur-title" id="informasi">
            STRUKTUR ORGANISASI KOMUNITAS
            <br>
            MUHAMMADIYAH BATAM
        </h2>


        <!-- Ketua -->
        <div class="ketua-row">

            <div class="struktur-card green">

                <img src="{{ asset('assets/img/man-1.svg') }}">

                <div class="card-content">

                    <h5>KETUA KOMUNITAS<br>MUHAMMADIYAH BATAM</h5>

                    <div class="line"></div>

                    <p>Dr. Achmad Nur Hidayat</p>

                </div>

            </div>

        </div>


        <!-- Row 2 -->
        <div class="struktur-row">

            <div class="struktur-card blue">

                <img src="{{ asset('assets/img/woman-1.svg') }}">

                <div class="card-content">

                    <h5>KETUA BIDANG<br>KEUANGAN DAN ASET</h5>

                    <div class="line"></div>

                    <p>Dr. Achmad Nur Hidayat</p>

                </div>

            </div>

            <div class="struktur-card cyan">

                <img src="{{ asset('assets/img/woman-2.svg') }}">

                <div class="card-content">

                    <h5>KETUA BIDANG AMAL<br>USAHA MUHAMMADIYAH</h5>

                    <div class="line"></div>

                    <p>Dr. Achmad Nur Hidayat</p>

                </div>

            </div>

            <div class="struktur-card yellow">

                <img src="{{ asset('assets/img/man-2.svg') }}">

                <div class="card-content">

                    <h5>KOORDINATOR PIMPINAN<br>CABANG</h5>

                    <div class="line"></div>

                    <p>Dr. Achmad Nur Hidayat</p>

                </div>

            </div>

        </div>


        <!-- Row 3 -->
        <div class="struktur-row row-last">

            <div class="struktur-card orange">

                <img src="{{ asset('assets/img/man-3.svg') }}">

                <div class="card-content">

                    <h5>KOORDINATOR PIMPINAN<br>RANTING</h5>

                    <div class="line"></div>

                    <p>Dr. Achmad Nur Hidayat</p>

                </div>

            </div>

            <div class="struktur-card red">

                <img src="{{ asset('assets/img/man-4.svg') }}">

                <div class="card-content">

                    <h5>KOORDINATOR<br>PEMBINAAN MASJID</h5>

                    <div class="line"></div>

                    <p>Dr. Achmad Nur Hidayat</p>

                </div>

            </div>

        </div>

        <!-- Deskripsi -->
        <div class="deskripsi-wrapper">

            <div class="desc-card">

                <h4>7 CABANG DAN 16 RANTING AKTIF</h4>

                <p>
                    Komunitas Muhammadiyah Batam memiliki
                    7 cabang dan 16 ranting yang tersebar
                    di berbagai wilayah sebagai pusat
                    koordinasi kegiatan dan dakwah.
                </p>

            </div>


            <div class="desc-card">

                <h4>BERKONTRIBUSI UNTUK MASYARAKAT</h4>

                <p>
                    Komunitas Muhammadiyah Batam aktif
                    berkontribusi melalui kegiatan sosial,
                    pendidikan dan pembinaan keagamaan
                    untuk masyarakat luas.
                </p>

            </div>


            <div class="desc-card">

                <h4>BERGERAK DAN BERTUMBUH BERSAMA</h4>

                <p>
                    Dengan semangat kebersamaan dan
                    kepemimpinan yang berkelanjutan,
                    organisasi terus berkembang untuk
                    memberikan dampak positif lebih luas.
                </p>

            </div>

        </div>

    </div>
                <!-- Wave -->
        <img src="{{ asset('assets/img/waves-2.svg') }}"
             class="struktur-wave">

</section>
@endsection