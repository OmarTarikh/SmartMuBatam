<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar d-flex flex-column">

    <!-- Logo -->
    <div class="sidebar-header text-center py-4 sidebar-divider-bottom">
        <img src="{{ asset('assets/img/logo_full_white.png') }}"
             alt="Logo"
             class="sidebar-logo"
             width="50">
    </div>

    <!-- Menu -->
    <ul class="nav flex-column px-2">

        {{-- DASHBOARD --}}
        @if(auth()->user()->role == 'superadmin')
        <li class="nav-item sidebar-divider-bottom">
            <a href="{{ url('/dashboard') }}" class="nav-link sidebar-link">
                <iconify-icon icon="mdi:view-dashboard-outline"></iconify-icon>
                <span>Dashboard</span>
            </a>
        </li>
        @endif


        {{-- MANAJEMEN ORGANISASI --}}
        @if(in_array(auth()->user()->role, ['superadmin','cabang','ranting']))
        <li class="nav-item sidebar-divider-bottom">

            <a class="nav-link sidebar-link d-flex align-items-center gap-2"
               data-bs-toggle="collapse"
               href="#orgMenu">

                <iconify-icon icon="mdi:account-group-outline"></iconify-icon>

                <span>Manajemen Organisasi</span>

            </a>

            <div class="collapse ps-4" id="orgMenu">

                {{-- Cabang --}}
                @if(in_array(auth()->user()->role,['superadmin','cabang']))
                <a href="{{ url('/organisasi/cabang') }}"
                   class="nav-link sub-link">
                    Cabang
                </a>
                @endif


                {{-- Ranting --}}
                @if(in_array(auth()->user()->role,['superadmin','cabang','ranting']))
                <a href="{{ url('/organisasi/ranting') }}"
                   class="nav-link sub-link">
                    Ranting
                </a>
                @endif


                {{-- Anggota --}}
                @if(in_array(auth()->user()->role,['superadmin','cabang','ranting']))
                <a href="{{ url('/organisasi/anggota') }}"
                   class="nav-link sub-link">
                    Anggota
                </a>
                @endif

            </div>

        </li>
        @endif



        {{-- UNIT & LEMBAGA --}}
        @if(in_array(auth()->user()->role,['superadmin','aum','masjid']))
        <li class="nav-item sidebar-divider-bottom">

            <a class="nav-link sidebar-link d-flex align-items-center gap-2"
               data-bs-toggle="collapse"
               href="#unitMenu">

                <iconify-icon icon="mdi:domain"></iconify-icon>

                <span>Unit & Lembaga</span>

            </a>

            <div class="collapse ps-4" id="unitMenu">

                {{-- AUM --}}
                @if(in_array(auth()->user()->role,['superadmin','aum']))
                <a href="{{ url('/unit-lembaga/aum/sekolah') }}"
                   class="nav-link sub-link">
                    AUM
                </a>
                @endif


                {{-- Masjid --}}
                @if(in_array(auth()->user()->role,['superadmin','masjid']))
                <a href="{{ url('/unit-lembaga/masjid') }}"
                   class="nav-link sub-link">
                    Masjid
                </a>
                @endif

            </div>

        </li>
        @endif



        {{-- KEUANGAN --}}
        @if(in_array(auth()->user()->role,['superadmin','keuangan']))
        <li class="nav-item sidebar-divider-bottom">
            <a href="{{ url('/keuangan/kas') }}" class="nav-link sidebar-link">
                <iconify-icon icon="mdi:cash"></iconify-icon>
                <span>Aset Keuangan</span>
            </a>
        </li>
        @endif



        {{-- PROGRAM KERJA DAN AGENDA --}}
        <li class="nav-item sidebar-divider-bottom">
            <a href="{{ url('/kegiatan') }}" class="nav-link sidebar-link">
                <iconify-icon icon="mdi:calendar"></iconify-icon>
                <span>Program Kerja & Agenda</span>
            </a>
        </li>

    </ul>


    <!-- Toggle Button -->
    <div class="toggle-wrapper">

        <button id="toggleSidebar"
                class="toggle-btn rounded-circle">

            <iconify-icon
                id="toggleIcon"
                icon="mdi:chevron-left">
            </iconify-icon>

        </button>

    </div>

</aside>