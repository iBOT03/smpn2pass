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
                    <h1 class="h3 mb-4 text-gray-800">Tambah Data Sekolah</h1>

                    <form method="post" action="<?= site_url('admin/ProfilSekolah/update/' . $info[0]->id) ?>" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nama Sekolah</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan nama sekolah ..." aria-describedby="basic-addon2" value="<?= $info[0]->nama; ?>">
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Slogan</p>
                                        <div class="input-group">
                                            <input name="slogan" id="slogan" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan slogan sekolah ..." aria-describedby="basic-addon2" value="<?= $info[0]->slogan; ?>">
                                        </div>
                                        <?= form_error('slogan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Email</p>
                                        <div class="input-group">
                                            <input name="email" id="email" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan email sekolah ..." aria-describedby="basic-addon2" maxlength="100" value="<?= $info[0]->email; ?>">
                                        </div>
                                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Contact Person</p>
                                        <div class="input-group">
                                            <input name="no_telpon" id="no_telpon" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan No Telepon/Whatsapp sekolah ..." aria-describedby="basic-addon2" value="<?= $info[0]->telepon; ?>">
                                        </div>
                                        <?= form_error('no_telpon', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <p>Tentang</p>
                                <div class="input-group">
                                    <textarea name="tentang" id="tentang" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan informasi tentang sekolah ..." aria-describedby="basic-addon2"><?= $info[0]->about; ?></textarea>
                                </div>
                                <?= form_error('tentang', '<small class="text-danger pl-2">', '</small>'); ?>

                                <p>Alamat</p>
                                <div class="input-group">
                                    <textarea name="alamat" id="alamat" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan alamat lengkap sekolah ..." aria-describedby="basic-addon2"><?= $info[0]->alamat; ?></textarea>
                                </div>
                                <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Upload Foto Sekolah</p>
                                        <div class="input-group">
                                            <input name="foto" id="foto" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('foto', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Tautan Video</p>
                                        <div class="input-group">
                                            <input name="link" id="link" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan link/tautan video profil sekolah ..." aria-describedby="basic-addon2" maxlength="100" value="<?= $info[0]->link; ?>">
                                        </div>
                                        <?= form_error('link', '<small class="text-danger pl-2">', '</small>'); ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p>Foto Lama</p>
                                        <div class="input-group">
                                            <img src="<?= base_url('./uploads/foto_sekolah/') . $info[0]->foto ?>" alt="img" width="320px">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>Foto Baru</p>
                                        <div class="input-group">
                                            <img id="preview" src="" alt="" width="320" /> <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <input name="created_at" id="created_at" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2" value="<?= $info[0]->created_at ?>" hidden>
                                            <input name="id" id="id" type="hidden" class="form-control border-dark small mb-3" placeholder="Masukkan Password" aria-describedby="basic-addon2" value="<?= $info[0]->id ?>" hidden>
                                        </div>
                                        <?= form_error('created_at', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <button type="submit" href="<?= site_url('admin/ProfilSekolah') ?>" class="btn btn-primary btn-icon-split ml-2" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan Data</span>
                                </button>
                                <a href="<?= site_url('admin/ProfilSekolah') ?>" class="btn btn-danger btn-icon-split" style="float: right;">
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

            <script>
                function tampilkanPreview(gambar, idpreview) {
                    //                membuat objek gambar
                    var gb = gambar.files;
                    //                loop untuk merender gambFar
                    for (var i = 0; i < gb.length; i++) {
                        //                    bikin variabel
                        var gbPreview = gb[i];
                        var imageType = /image.*/;
                        var preview = document.getElementById(idpreview);
                        var reader = new FileReader();
                        if (gbPreview.type.match(imageType)) {
                            //                        jika tipe data sesuai
                            preview.file = gbPreview;
                            reader.onload = (function(element) {
                                return function(e) {
                                    element.src = e.target.result;
                                };
                            })(preview);
                            //                    membaca data URL gambar
                            reader.readAsDataURL(gbPreview);
                        } else {
                            //                        jika tipe data tidak sesuai
                            alert(
                                "Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
                        }
                    }
                }
            </script>
</body>

</html>