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
                        <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>
                    </div>

                    <?php if (!empty($success_msg)) { ?>
                        <?php echo $success_msg; ?>
                    <?php } ?>
                    <?php if (!empty($error_msg)) { ?>
                        <?php echo $error_msg; ?>
                    <?php } ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= base_url('admin/Admin/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($info as $row) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $row->username ?></td>
                                                <td><?= $row->email ?></td>
                                                <td>
                                                    <?php if ($row->level == 0) { ?>
                                                        Superadmin
                                                    <?php } else { ?>
                                                        Admin
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row->status == 0) {
                                                        echo '<span class="badge badge-danger">Non - Aktif</span>';
                                                    } elseif ($row->status == 1) {
                                                        echo '<span class="badge badge-success">Aktif</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $row->created_at ?></td>
                                                <td><?= $row->updated_at ?></td>
                                                <td>
                                                    <?php if ($_SESSION['level'] != 1) { ?>
                                                        <a href=<?= site_url('admin/Admin/detail/' . $row->id) ?> class="btn btn-sm btn-success btn-circle">
                                                            <i class="fa fa-search"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php if ($_SESSION['username'] == $row->username) { ?>
                                                        <a href="<?= site_url('admin/Admin/update/' . $row->id) ?>" class="btn btn-sm btn-warning btn-circle">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
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