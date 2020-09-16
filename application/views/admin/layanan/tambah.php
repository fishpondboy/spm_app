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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Layanan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <a href="<?php echo site_url('admin/layanan/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="card-body">

                                    <form action="<?php echo site_url('admin/layanan/tambah') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_layanan">ID Layanan</label>
                                            <input class="form-control" type="text" name="id_layanan" value="LYN<?= sprintf("%03s", $id_layanan) ?>" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_layanan">Nama Layanan*</label>
                                            <input class="form-control <?php echo form_error('nama_layanan') ? 'is-invalid' : '' ?>" type="text" name="nama_layanan" placeholder="Nama Layanan" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_layanan') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_subkomponen">Nama SubKomponen*</label>
                                            <select class="form-control selectpicker <?php echo form_error('id_subkomponen') ? 'is-invalid' : '' ?>" name="id_subkomponen" id="id_subkomponen" data-live-search="true" title="Pilih SubKomponen...">
                                                <?php foreach ($subkomponen as $k) : ?>
                                                    <option data-tokens=" <?= $k->nama_subkom ?>" value="<?= $k->id_subkom ?>"><?= $k->nama_subkom ?> <?= $k->keterangan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_subkomponen') ?>
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