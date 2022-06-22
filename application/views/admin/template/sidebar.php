<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMPN 2 PASS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="aktif">
        <a class="nav-link" href="<?= base_url('admin/Dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Civitas
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item" id="aktif">
        <a class="nav-link" href="<?= base_url('admin/ProfilSekolah') ?>">
            <i class="fas fa-fw fa-building"></i>
            <span>Profil Sekolah</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" id="aktif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kelola Akun</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Civitas Admin & PTK :</h6>
                <a class="collapse-item" href="buttons.html">Admin</a>
                <a class="collapse-item" href="cards.html">PTK</a>
                <h6 class="collapse-header">Civitas Siswa & Alumni :</h6>
                <a class="collapse-item" href="buttons.html">Siswa</a>
                <a class="collapse-item" href="cards.html">PTK</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DATA MASTER
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item" id="aktif">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Berita</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item" id="aktif">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Jabatan PTK</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item" id="aktif">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-comment"></i>
            <span>Pesan Masuk</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
    // Get the container element
    var btnContainer = document.getElementById("aktif");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("nav-link");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");

            // If there's no active class
            if (current.length > 0) {
                current[0].className = current[0].className.replace(" active", "");
            }

            // Add the active class to the current/clicked button
            this.className += " active";
        });
    }
</script>