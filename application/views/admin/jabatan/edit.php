<!-- ======= Header ======= -->
<?php $this->load->view('admin/template/header'); ?>
<!-- End Header -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('admin/template/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/template/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Data Jabatan</h1>

                    <form method="post" action="<?= site_url('admin/Jabatan/update/' . $info[0]->id) ?>" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Nama Lengkap</p>
                                        <div class="input-group">
                                            <input name="jabatan" id="jabatan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan jabatan ..." aria-describedby="basic-addon2" value="<?= $info[0]->jabatan; ?>">
                                        </div>
                                        <?= form_error('jabatan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <input name="id" id="id" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan id siswa ..." aria-describedby="basic-addon2" value="<?= $info[0]->id; ?>">
                                <input name="created_at" id="created_at" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan id siswa ..." aria-describedby="basic-addon2" value="<?= $info[0]->created_at; ?>">

                                <button type="submit" href="<?= site_url('admin/Jabatan') ?>" class="btn btn-primary btn-icon-split ml-2" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan Data</span>
                                </button>
                                <a href="<?= site_url('admin/Jabatan') ?>" class="btn btn-danger btn-icon-split" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-reply"></i>
                                    </span>
                                    <span class="text">Kembali</span>
                                </a>
                            </div>
                            <!-- Card Body -->
                        </div>
                        <!-- Card -->
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('admin/template/footer'); ?>
            <!-- End of Footer -->
</body>

</html>