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

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Sub Unit</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <a href="<?php echo site_url('admin/subpj/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="card-body">

                                    <form action="<?php echo site_url('admin/subpj/tambah') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_subpj">ID Sub Unit</label>
                                            <input class="form-control" type="text" name="id_subpj" value="SPJ<?= sprintf("%03s", $id_subpj) ?>" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_subpjom">Nama Sub Unit*</label>
                                            <input class="form-control <?php echo form_error('nama_subpj') ? 'is-invalid' : '' ?>" type="text" name="nama_subpj" placeholder="Nama Sub Unit Penanggung Jawab" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_subpj') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_pj">Nama Unit Penanggung Jawab*</label>
                                            <select class="form-control selectpicker <?php echo form_error('id_pj') ? 'is-invalid' : '' ?>" name="id_pj" id="id_pj" data-live-search="true" title="Pilih Unit Penanggung Jawab...">
                                                <?php foreach ($unitpj as $k) : ?>
                                                    <option data-tokens=" <?= $k->nama_pj ?>" value="<?= $k->id_pj ?>"><?= $k->nama_pj ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_pj') ?>
                                            </div>
                                        </div>

                                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
                                    </form>

                                </div>
                                <div class="card-footer small text-muted">
                                    * required fields
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

</body>

</html>