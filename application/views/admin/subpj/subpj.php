<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("_partials/sidebar.php") ?>
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
                    <?php $this->load->view("_partials/breadcrumb.php")
                    ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Sub Unit Penanggung Jawab</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <a href="<?php echo site_url('admin/subpj/tambah') ?>"><i class="fas fa-plus"></i> Tambah Baru</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover dataTable" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sub Unit</th>
                                                    <th>Unit</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($subpj as $k) : ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $k->id_subpj ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $k->nama_subpj ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $k->nama_pj ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= site_url('admin/subpj/ubah/' . $k->id_subpj) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                                            <a onclick="deleteConfirm('<?= site_url('admin/subpj/hapus/' . $k->id_subpj) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a> </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfooter>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sub Unit</th>
                                                    <th>Unit</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfooter>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>