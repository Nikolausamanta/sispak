<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-2x fa-file-waveform"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISPAK Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $menu == 'beranda' ? 'active' : '' ?>">
        <a href="<?= base_url('admin'); ?>" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sistem Pakar
    </div>
    <li class="nav-item <?= $menu == 'penyakit' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/penyakit'); ?>" class="nav-link">
            <i class="fa-solid fa-fw fa-stethoscope"></i>
            <span>Penyakit</span></a>
    </li>
    <li class="nav-item <?= $menu == 'gejala' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/gejala'); ?>" class="nav-link">
            <i class="fa-solid fa-fw fa-syringe"></i>
            <span>Gejala</span></a>
    </li>
    <li class="nav-item <?= $menu == 'kondisi' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/kondisi'); ?>" class="nav-link">
            <i class="fa-solid fa-fw fa-timeline"></i>
            <span>Kondisi</span></a>
    </li>
    <li class="nav-item <?= $menu == 'pengetahuan' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/pengetahuan'); ?>" class="nav-link">
            <i class="fa-solid fa-fw fa-brain"></i>
            <span>Pengetahuan</span></a>
    </li>
    <li class="nav-item <?= $menu == 'hasildiagnosa' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/hasildiagnosa'); ?>" class="nav-link">
            <i class="fa-solid fa-fw fa-notes-medical"></i>
            <span>Hasil Diagnosa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Account
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $menu == 'profile' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/profile'); ?>" class="nav-link">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $menu == 'edit_profile' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/editprofile'); ?>" class="nav-link">
            <i class="fa-solid fa-fw fa-pen-to-square"></i>
            <span>Edit Profile</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fa-solid fa-fw fa-arrow-right-from-bracket"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->