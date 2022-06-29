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
                    <h1 class="h3 mb-4 text-gray-800">Edit Data PTK</h1>

                    <form method="post" action="<?= site_url('admin/Ptk/update/' . $bagian[0]->id) ?>" enctype="multipart/form-data">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Nama Ptk</p>
                                        <div class="input-group">
                                            <input name="nama" id="nama" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan nama pengajar/tenaga kerja ..." aria-describedby="basic-addon2" value="<?= $bagian[0]->nama ?>">
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>NIP</p>
                                        <div class="input-group">
                                            <input name="nip" id="nip" type="text" class="form-control border-dark small mb-3" placeholder="Masukkan NIP (isi kan - jika tidak ada) ..." aria-describedby="basic-addon2" value="<?= $bagian[0]->nip ?>">
                                        </div>
                                        <?= form_error('nip', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p>Upload Foto</p>
                                        <div class="input-group">
                                            <input name="foto" id="foto" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                        </div>
                                        <?= form_error('foto', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Jabatan</p>
                                        <div class="input-group">
                                            <Select class="form-control border-dark small mb-3" id="jabatan" name="jabatan" aria-describedby="basic-addon2">
                                                <option value="<?= set_value('row') ?>">--- Pilih ---</option>
                                                <?php foreach ($row as $aaa) { ?>
                                                    <option value="<?= $aaa['id']; ?>" <?= ($data[0]->id == $aaa['id'] ? 'selected' : '') ?>><?= $aaa['jabatan'] ?></option>
                                                <?php } ?>
                                            </Select>
                                        </div>
                                        <?= form_error('jabatan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p>Foto Lama</p>
                                        <div class="input-group">
                                            <img src="<?= base_url('./uploads/ptk/') . $bagian[0]->foto ?>" alt="img" width="100px">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <p>Foto Baru</p>
                                        <div class="input-group">
                                            <img id="preview" src="" alt="" width="100px" /> <br>
                                        </div>
                                    </div>
                                </div><br>

                                <input name="id" id="id" type="text" class="form-control border-dark small mb-3" value="<?= $bagian[0]->id ?>" hidden>
                                <input name="created_at" id="created_at" type="text" class="form-control border-dark small mb-3" value="<?= $bagian[0]->created_at ?>" hidden>

                                <button type="submit" href="<?= site_url('admin/Ptk') ?>" class="btn btn-primary btn-icon-split ml-2" style="float: right;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Simpan Data</span>
                                </button>
                                <a href="<?= site_url('admin/Ptk') ?>" class="btn btn-danger btn-icon-split" style="float: right;">
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