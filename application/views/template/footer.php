<footer id="footer">

    <!-- <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>SMPN 2 <span>Pasongsongan</span></h3>
                    <p><?= $info[0]->alamat ?><br>
                        <strong>Telepon:</strong> <?= $info[0]->telepon ?><br>
                        <strong>Email:</strong> <?= $info[0]->email ?><br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href<?= base_url('') ?>#hero">Beranda</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>#about">Profil</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>#services">Ekstrakurikuler</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('Berita') ?>">Berita</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('') ?>#contact">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <!-- <h4>Civitas Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Kelas 7</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Kelas 8</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Kelas 9</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Alumni</a></li>
                    </ul> -->
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span><?= SITE_NAME . " " . Date('Y') ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | Develop by digiBox
        </div>
    </div>
</footer>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('') ?>assets/user/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url('') ?>assets/user/vendor/aos/aos.js"></script>
<script src="<?= base_url('') ?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('') ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('') ?>assets/admin/js/demo/datatables-demo.js"></script>

<script src="<?= base_url('') ?>assets/user/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('') ?>assets/user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('') ?>assets/user/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('') ?>assets/user/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= base_url('') ?>assets/user/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('') ?>assets/user/js/main.js"></script>