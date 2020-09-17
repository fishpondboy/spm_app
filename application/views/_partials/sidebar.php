<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin') ?>">
        <div class="sidebar-brand-text mx-3">SPM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Back Office
    </div>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'komponen' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/komponen') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Komponen</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'subkomponen' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/subkomponen') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sub Komponen</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'layanan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/layanan') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Jenis Layanan</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'unitpj' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/unitpj') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Unit Penanggung Jawab</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'subpj' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/subpj') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Sub Unit Penanggung Jawab</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'indikator' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/indikator') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Indikator</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>