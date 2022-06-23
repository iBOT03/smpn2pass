<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="<?= base_url('') ?>">SMPN 2 <span>Pasongsongan</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto <?= ($this->uri->segment(1) == 'Beranda' ? 'active' : '') ?>" href="<?= base_url('') ?>#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('') ?>#about">Profil</a></li>
                <li class="dropdown"><a href="<?= base_url('') ?>"><span>Siswa</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>                        
                        <li class="dropdown"><a href="<?= base_url('') ?>"><span>Siswa</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="<?= base_url('') ?>">Kelas 7</a></li>
                                <li><a href="<?= base_url('') ?>">Kelas 8</a></li>
                                <li><a href="<?= base_url('') ?>">Kelas 9</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url('') ?>">Alumni</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="<?= base_url('') ?>#services">Service</a></li>
                <li><a class="nav-link scrollto <?= ($this->uri->segment(1) == 'Berita' ? 'active' : '') ?>" href="<?= base_url('Berita') ?>">Berita</a></li>
                <!-- <li><a class="nav-link scrollto" href="#team">PTK</a></li> -->
                <li><a class="nav-link scrollto <?= ($this->uri->segment(1) == 'Ptk' ? 'active' : '') ?>" href="<?= base_url('Ptk') ?>">PTK</a></li>
                <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li> -->
                <li><a class="nav-link scrollto" href="<?= base_url('') ?>#contact">Kontak</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>