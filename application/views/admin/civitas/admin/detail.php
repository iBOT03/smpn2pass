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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail akun</h1>
                    </div>

                    <form action="" method="POST">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit" name="aktif" id="aktif"><i class="fas fa-check fa-sm text-white-50"></i> Aktif</button>
                                <button class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" type="submit" name="mati" id="mati"><i class="fas fa-power-off fa-sm text-white-50"></i> Non - Aktif</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row align-items-center">
                                            <?php foreach ($info as $row) { ?>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="my-auto col-sm-2">
                                                            <p>Username :</p>
                                                        </div>
                                                        <div class="my-auto col-sm-9">
                                                            <p><?= $row->username ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="my-auto col-sm-2">
                                                            <p>Email :</p>
                                                        </div>
                                                        <div class="my-auto col-sm-9">
                                                            <p><?= $row->email ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="my-auto col-sm-2">
                                                            <p>Jabatan :</p>
                                                        </div>
                                                        <div class="my-auto col-sm-9">
                                                            <p>
                                                                <?php if ($row->level == 0) { ?>
                                                                    Superadmin
                                                                <?php } else { ?>
                                                                    Admin
                                                                <?php } ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="my-auto col-sm-2">
                                                            <p>Status :</p>
                                                        </div>
                                                        <div class="my-auto col-sm-9">
                                                            <p><?php
                                                                if ($row->status == 0) {
                                                                    echo '<span class="badge badge-danger">Non - Aktif</span>';
                                                                } elseif ($row->status == 1) {
                                                                    echo '<span class="badge badge-success">Aktif</span>';
                                                                }
                                                                ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="my-auto col-sm-2">
                                                            <p>Tanggal bergabung :</p>
                                                        </div>
                                                        <div class="my-auto col-sm-9">
                                                            <p><?= $row->created_at ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="my-auto col-sm-2">
                                                            <p>Terakhir diperbaharui :</p>
                                                        </div>
                                                        <div class="my-auto col-sm-9">
                                                            <p><?= $row->updated_at ?></p>
                                                        </div>
                                                    </div>
                                                    <a href="<?= base_url('admin/Admin') ?>" class="btn btn-icon btn-danger" type="submit" style="margin-bottom: 0px">
                                                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                                                        <span class="btn-inner--text">Kembali</span>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php $this->load->view('admin/template/footer'); ?>
    <!-- End of Footer -->
</body>

</html>