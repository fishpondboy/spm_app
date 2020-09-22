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
                    <?php $this->load->view("_partials/breadcrumb.php")
                    ?>

                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Data</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <a href="<?php echo site_url('user/overview/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                                </div>
                                <div class="card-body">

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama_indikator">Nama Indikator</label>
                                            <input class="form-control" type="text" name="nama_indikator" value="<?= $data->nama_indikator ?>" readonly />
                                            <input class="form-control" type="text" name="id_data" value="<?= $data->id_data ?>" hidden />
                                        </div>

                                        <div class="form-group">
                                            <label for="ket_satuan">Keterangan Satuan</label>
                                            <input class="form-control" type="text" name="ket_satuan" value="<?= $data->ket_satuan ?>" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input class="form-control" type="text" name="tahun" value="<?= $data->tahun ?>" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label for="target">Target </label>
                                            <input class="form-control" type="text" name="target" value="<?= $data->target ?>" readonly id="target" />
                                            <input class="form-control" type="text" name="id_target" value="<?= $data->id_target ?>" hidden id="id_target" />
                                        </div>

                                        <div class="form-group">
                                            <label for="angka_real">Angka Real</label>
                                            <input class="form-control <?php echo form_error('angka_real') ? 'is-invalid' : '' ?>" type="text" name="angka_real" value="<?= $data->angka_real ?>" onkeyup="autoCalculate()" id="angka_real" />
                                            <div class=" invalid-feedback">
                                                <?php echo form_error('angka_real') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="capaian">Capaian </label>
                                            <input class="form-control" type="text" name="capaian" readonly id="capaian" value="<?= $data->capaian ?>" />
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
    <script>
        function autoCalculate() {
            var angka_real = document.getElementById('angka_real').value;
            var target = document.getElementById('target').value;
            var capaian = document.getElementById('capaian');
            if (isNaN(target)) {
                if (target !== angka_real) {
                    capaian.value = 'Target Belum Tercapai';
                } else {
                    capaian.value = 'Target Telah Tercapai';
                }
            } else {
                var hasil = angka_real / target * 100;
                capaian.value = hasil + ' %';
            }
        }
    </script>

</body>

</html>