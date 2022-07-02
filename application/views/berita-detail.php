<!-- ======= Header ======= -->
<?php $this->load->view('template/header.php'); ?>
<!-- End Header -->

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <?php $this->load->view('template/topbar'); ?>
    <!-- End Header -->

    <main id="main" data-aos="fade-up">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Berita</h2>
                    <ol>
                        <li><a href="<?= base_url('') ?>">Beranda</a></li>
                        <li><a href="<?= base_url('Berita') ?>">Berita</a></li>
                        <li>Detail Berita</li>
                    </ol>
                </div>

            </div>
        </section><!-- Breadcrumbs Section -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <!-- <div class="swiper-slide"> -->
                                <img src="<?= base_url('./uploads/berita/' . $info[0]->foto) ?>" alt="">
                                <!-- </div> -->

                                <!-- <div class="swiper-slide">
                                    <img src="<?= base_url('assets/user/') ?>img/portfolio/portfolio-details-2.jpg" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets/user/') ?>img/portfolio/portfolio-details-3.jpg" alt="">
                                </div> -->

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Detail Berita</h3>
                            <ul>
                                <li><strong>Diperbaharui pada</strong>: <?= date('d F Y', strtotime($info[0]->update_at)) ?></li>
                                <li><strong>Tautan</strong>: <a href="#"><?= $info[0]->link; ?></a></li>
                                <li><strong>Uploaded by</strong>: <?= $info[0]->username; ?></li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2><?= $info[0]->judul; ?></h2>
                            <p>
                                <?= $info[0]->deskripsi; ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php $this->load->view('template/footer.php'); ?>
    <!-- End Footer -->

</body>

</html>