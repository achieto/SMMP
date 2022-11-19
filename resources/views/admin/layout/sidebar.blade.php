<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">user</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/add-user"> Add User </a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/list-user"> List User </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Kurikulum</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#kurikulum" aria-expanded="false" aria-controls="kurikulum" onclick="document.getElementById('kur').click()">
                <i class="menu-icon mdi mdi-library-books"></i>
                <span class="menu-title">Kurikulum Pages</span>
            </a>
            <div class="collapse" id="kurikulum" hidden="hidden">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a id="kur" class="nav-link" href="/admin/list-kurikulum"> List Kurikulum </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">CPL</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#cpl" aria-expanded="false" aria-controls="cpl">
                <i class="menu-icon mdi mdi-format-list-bulleted-type"></i>
                <span class="menu-title">CPL Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cpl">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/add-cpl"> Add CPL </a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/list-cpl"> List CPL </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">MK</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#mk" aria-expanded="false" aria-controls="mk">
                <i class="menu-icon mdi mdi-collage"></i>
                <span class="menu-title">MK Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mk">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/add-mk"> Add MK </a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/list-mk"> List MK </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">RPS</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rps" aria-expanded="false" aria-controls="rps">
                <i class="menu-icon mdi mdi-file-outline"></i>
                <span class="menu-title">RPS Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rps">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/list-rps"> List RPS </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Soal</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#soal" aria-expanded="false" aria-controls="soal">
                <i class="menu-icon mdi mdi-comment-question-outline"></i>
                <span class="menu-title">Soal Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="soal">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/admin/print-soal"> Print Soal </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>