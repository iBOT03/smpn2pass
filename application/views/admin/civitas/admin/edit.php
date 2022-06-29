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
                    <h1 class="h3 mb-4 text-gray-800">Edit Informasi Admin</h1>

                    <form method="post" action="<?= site_url('admin/Admin/update/' . $info[0]->id) ?>" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Username</p>
                                        <div class="input-group">
                                            <input name="username" id="username" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan username ..." aria-describedby="basic-addon2" value="<?= $info[0]->username; ?>">
                                        </div>
                                        <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Email</p>
                                        <div class="input-group">
                                            <input name="email" id="email" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan email ..." aria-describedby="basic-addon2" value="<?= $info[0]->email; ?>">
                                        </div>
                                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input name="created_at" id="created_at" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2" value="<?= $info[0]->created_at ?>" hidden>
                                            <input name="id" id="id" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2" value="<?= $info[0]->id ?>" hidden>
                                            <input name="level" id="level" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2" value="<?= $info[0]->level ?>" hidden>
                                        </div>
                                        <?= form_error('created_at', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <button type="submit" href="<?= site_url('admin/Admin') ?>" class="btn btn-primary btn-icon-split ml-2" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan Data</span>
                                </button>
                            </div>
                            <!-- Card Body -->
                        </div>
                        <!-- Card -->
                    </form>
                </div>
                <!-- /.container-fluid -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Password Admin</h1>

                    <?php if (!empty($success_msg)) { ?>
                        <?php echo $success_msg; ?>
                    <?php } ?>
                    <?php if (!empty($error_msg)) { ?>
                        <?php echo $error_msg; ?>
                    <?php } ?>

                    <form method="post" action="<?= site_url('admin/Admin/upPass/' . $info[0]->id) ?>" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Password</p>
                                        <div class="input-group">
                                            <input name="pwlama" id="pwlama" type="password" class="form-control border-dark small mb-3" placeholder="Masukkan password lama ..." aria-describedby="basic-addon2" maxlength="100">
                                        </div>
                                        <?= form_error('pwlama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Konfirmasi Password</p>
                                        <div class="input-group">
                                            <input name="pwbaru" id="pwbaru" type="password" class="form-control border-dark small mb-3" placeholder="Masukkan password baru ..." aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('pwbaru', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Konfirmasi Password</p>
                                        <div class="input-group">
                                            <input name="konfirpwbaru" id="konfirpwbaru" type="password" class="form-control border-dark small mb-3" placeholder="Masukkan konfirmasi password baru ..." aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('konfirpwbaru', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <button type="submit" href="<?= site_url('admin/Admin') ?>" class="btn btn-primary btn-icon-split ml-2" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan Data</span>
                                </button>
                                <a href="<?= site_url('admin/Admin') ?>" class="btn btn-danger btn-icon-split" style="float: right;">
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

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view('admin/template/footer'); ?>
            <!-- End of Footer -->

</body>

</html>