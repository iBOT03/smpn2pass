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
                    <h1 class="h3 mb-4 text-gray-800">Edit Berita</h1>

                    <form method="post" action="<?= site_url('admin/Berita/update/' . $info[0]->id_berita) ?>" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Judul Berita</p>
                                        <div class="input-group">
                                            <input name="judul" id="judul" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan judul berita ..." aria-describedby="basic-addon2" value="<?= $info[0]->judul; ?>">
                                        </div>
                                        <?= form_error('judul', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Tautan Pendukung</p>
                                        <div class="input-group">
                                            <input name="link" id="link" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan tautan pendukung berita (isi kan - jika tidak ada) ..." aria-describedby="basic-addon2" value="<?= $info[0]->link; ?>">
                                        </div>
                                        <?= form_error('link', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <p>deskripsi</p>
                                <div class="input-group">
                                    <textarea name="deskripsi" id="deskripsi" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan deskripsi lengkap berita ..." aria-describedby="basic-addon2"><?= $info[0]->deskripsi; ?></textarea>
                                </div>
                                <?= form_error('deskripsi', '<small class="text-danger pl-2">', '</small>'); ?>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Upload Foto</p>
                                        <div class="input-group">
                                            <input name="foto" id="foto" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('foto', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>Foto Lama</p>
                                        <div class="input-group">
                                            <img src="<?= base_url('./uploads/berita/') . $info[0]->foto ?>" alt="img" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Foto Baru</p>
                                        <div class="input-group">
                                            <img id="preview" src="" alt="" width="100px" /> <br>
                                        </div>
                                    </div>
                                </div><br>

                                <input name="id" id="id" type="hidden" aria-describedby="basic-addon2" value="<?= $info[0]->id_berita; ?>">
                                <input name="created_at" id="created_at" type="hidden"  aria-describedby="basic-addon2" value="<?= $info[0]->created_at; ?>">

                                <button type="submit" href="<?= site_url('admin/Berita') ?>" class="btn btn-primary btn-icon-split ml-2" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan Data</span>
                                </button>
                                <a href="<?= site_url('admin/Berita') ?>" class="btn btn-danger btn-icon-split" style="float: right;">
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