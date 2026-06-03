<!-- TOPBAR -->
<nav class="topbar d-flex justify-content-between align-items-center px-4 py-3">

    <h5 class="m-0 fw-semibold title-text">Judul > subjudul</h5>

    <div class="dropdown user-section d-flex align-items-center gap-3">

        <span style="color: #00000050;">ALESER TARIKH OMAR</span>

        <!-- Trigger -->
        <button class="btn p-0 border-0 bg-transparent d-flex align-items-center"
                data-bs-toggle="dropdown">
            <iconify-icon 
                icon="mdi:user" 
                width="35" 
                height="35" 
                style="color: #00000050;">
            </iconify-icon>                
        </button>

        <!-- Dropdown -->
        <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-2">

            <li>
                <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                    <iconify-icon icon="mdi:account-outline"></iconify-icon>
                    Profile
                </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
                <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="{{ url('/login') }}">
                    <iconify-icon icon="mdi:logout"></iconify-icon>
                    Logout
                </a>
            </li>

        </ul>

    </div>

</nav>