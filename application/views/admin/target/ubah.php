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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Target</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <a href="<?php echo site_url('admin/target/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="card-body">

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input class="form-control" type="text" name="id_target" value="<?= $target->id_target ?>" hidden />

                                        <div class="form-group">
                                            <label for="id_indikator">Nama Indikator*</label>
                                            <select class="form-control selectpicker <?php echo form_error('id_indikator') ? 'is-invalid' : '' ?>" name="id_indikator" id="id_indikator" data-live-search="true">
                                                <option data-tokens=" <?= $target->nama_indikator ?>" value="<?= $target->id_indikator ?>"><?= $target->nama_indikator ?></option>
                                                <?php foreach ($indikator as $k) : ?>
                                                    <option data-tokens=" <?= $k->nama_indikator ?>" value="<?= $k->id_indikator ?>"><?= $k->nama_indikator ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_indikator') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tahun">Tahun*</label>
                                            <input class="form-control <?php echo form_error('tahun') ? 'is-invalid' : '' ?>" type="text" name="tahun" value="<?= $target->tahun ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('tahun') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="target">Target*</label>
                                            <input class="form-control <?php echo form_error('target') ? 'is-invalid' : '' ?>" type="text" name="target" value="<?= $target->target ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('target') ?>
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