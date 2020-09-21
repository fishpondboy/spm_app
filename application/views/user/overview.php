<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php //$this->load->view("_partials/sidebar.php") 
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php //$this->load->view("_partials/breadcrumb.php") 
                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-capitalize"><?= $unit ?> - Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php
                                    $first = reset($tahun);
                                    foreach ($tahun as $t) {
                                        if ($t  == $first) { ?>
                                            <a class="nav-link active" id="nav-<?= $t->tahun ?>-tab" data-toggle="tab" href="#nav-<?= $t->tahun ?>" role="tab" aria-controls="nav-<?= $t->tahun ?>" aria-selected="true"><?= $t->tahun ?></a> <?php } else { ?>
                                            <a class="nav-link" id="nav-<?= $t->tahun ?>-tab" data-toggle="tab" href="#nav-<?= $t->tahun ?>" role="tab" aria-controls="nav-<?= $t->tahun ?>" aria-selected="true"><?= $t->tahun ?></a> <?php } ?>
                                    <?php }; ?>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <?php
                                foreach ($tahun as $t) {
                                    if ($t  == $first) { ?>
                                        <div class="tab-pane fade show active" id="nav-<?= $t->tahun ?>" role="tabpanel" aria-labelledby="nav-<?= $t->tahun ?>-tab"><?php } else { ?>
                                            <div class="tab-pane fade show" id="nav-<?= $t->tahun ?>" role="tabpanel" aria-labelledby="nav-<?= $t->tahun ?>-tab"><?php } ?>
                                            <div class="card shadow my-4">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover dataTable" id="dataTable" width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>

                                                                    <th>Komponen</th>
                                                                    <th>Layanan</th>
                                                                    <th>Indikator</th>
                                                                    <th>Satuan</th>
                                                                    <th>Target</th>
                                                                    <th>Angka Real</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $s = $t->tahun;
                                                                foreach (${"indikator" . $s} as $i) : ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $i->nama_komponen ?>
                                                                            <br>
                                                                            <small><?php echo $i->nama_subkom ?></small>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $i->nama_layanan ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $i->nama_indikator ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $i->ket_satuan ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $i->target ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $i->angka_real ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                            <tfooter>
                                                                <tr>
                                                                    <th>Komponen</th>
                                                                    <th>Layanan</th>
                                                                    <th>Indikator</th>
                                                                    <th>Satuan</th>
                                                                    <th>Target</th>
                                                                    <th>Angka Real</th>
                                                                </tr>
                                                            </tfooter>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <?php }; ?>
                                        </div>
                                        <!-- /.container-fluid -->

                            </div>
                        </div>
                        <!-- End of Main Content -->

                        <!-- Footer -->
                        <?php $this->load->view("_partials/footer.php") ?>
                        <!-- End of Footer -->

                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <?php $this->load->view("_partials/scrolltop.php") ?>

                <?php $this->load->view("_partials/modal.php") ?>
                <?php $this->load->view("_partials/js.php") ?>

</body>

</html>