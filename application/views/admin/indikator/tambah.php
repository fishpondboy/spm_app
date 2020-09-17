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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Indikator</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <a href="<?php echo site_url('admin/indikator/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="card-body">

                                    <form action="<?php echo site_url('admin/indikator/tambah') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_indikator">ID Indikator</label>
                                            <input class="form-control" type="text" name="id_indikator" value="ID<?= sprintf("%03s", $id_indikator) ?>" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_indikator">Nama Indikator*</label>
                                            <input class="form-control <?php echo form_error('nama_indikator') ? 'is-invalid' : '' ?>" type="text" name="nama_indikator" placeholder="Nama Indikator" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_indikator') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ket_satuan">Keterangan Satuan</label>
                                            <input class="form-control <?php echo form_error('ket_satuan') ? 'is-invalid' : '' ?>" type="text" name="ket_satuan" placeholder="Satuan Indikator" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('ket_satuan') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_layanan">Nama Layanan*</label>
                                            <select class="form-control selectpicker <?php echo form_error('id_layanan') ? 'is-invalid' : '' ?>" name="id_layanan" id="id_layanan" data-live-search="true" title="Pilih Layanan...">
                                                <?php foreach ($layanan as $k) : ?>
                                                    <option data-tokens=" <?= $k->nama_layanan ?>" value="<?= $k->id_layanan ?>"><?= $k->nama_layanan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_layanan') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_subpj">Nama Unit Penanggung Jawab*</label>
                                            <select class="form-control selectpicker <?php echo form_error('id_subpj') ? 'is-invalid' : '' ?>" name="id_subpj" id="id_subpj" data-live-search="true" title="Pilih Layanan...">
                                                <?php foreach ($subpj as $k) : ?>
                                                    <option data-tokens=" <?= $k->nama_subpj ?>" value="<?= $k->id_subpj ?>"><?= $k->nama_subpj ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_subpj') ?>
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