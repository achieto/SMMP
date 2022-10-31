<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/dosen/dashboard">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rps" aria-expanded="false" aria-controls="rps">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">RPS</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rps">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/dosen/rps/add-rps">Tambah RPS Baru</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dosen/rps/list-rps">Lihat Daftar RPS</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#cpl" aria-expanded="false" aria-controls="cpl">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">CPLMK</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cpl">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('cplmk-add')}}">Tambah CPLMK Baru</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('cplmk-list')}}">Lihat Daftar CPLMK</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#cpmk" aria-expanded="false" aria-controls="cpmk">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">CPMK</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cpmk">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/dosen/cpmk/add-cpmk">Tambah CPMK Baru</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dosen/cpmk/list-cpmk">Lihat Daftar CPMK</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>