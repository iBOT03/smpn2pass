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
                        <h1 class="h3 mb-0 text-gray-800">Profil Sekolah</h1>
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
                            <a href="<?= base_url('admin/ProfilSekolah/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tentang</th>
                                            <th>Foto</th>
                                            <th>Slogan</th>
                                            <th>Tautan</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tentang</th>
                                            <th>Foto</th>
                                            <th>Slogan</th>
                                            <th>Tautan</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($info as $row) { ?>
                                            <tr>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->about ?></td>
                                                <td><img alt="Foto" src="<?= base_url('./uploads/foto_sekolah/') . $row->foto; ?>" style="width: 10rem;"></td>
                                                <td><?= $row->slogan ?></td>
                                                <td><a href="<?= $row->link ?>" target="_blank" rel="noopener noreferrer">Lihat Video</a></td>
                                                <td><?= $row->alamat ?></td>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->telepon ?></td>
                                                <td>
                                                    <a href=<?= site_url('admin/ProfilSekolah/update/' . $row->id) ?> class="btn btn-sm btn-info btn-circle">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <!-- <a href="<?= site_url('') ?>" onclick="confirm_modal('<?= '' ?>')" class="btn btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#hapusModal">
                                                        <i class="fa fa-trash"></i>
                                                    </a> -->
                                                </td>
                                            </tr>
                                        <?php } ?>
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