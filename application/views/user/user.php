<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="<?= base_url(); ?>">Sistem Pakar</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block ">
            <ul>
                <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#services">Layanan</a></li>
                <li><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
                <li><a href="<?= base_url('auth'); ?>">Login</a></li>

                <!-- Nav Item - User Information -->
                <!-- <li class="nav-item dropdown no-arrow">
                <li><a class="nav-link dropdown-toggle" href="<?= base_url(''); ?>"><?= $user['name']; ?></a></li>

                <div class="mt-1" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle img-fluid" alt="Responsive image" style="width: 30px;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                </div>

                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('admin2/profile'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
                </li> -->
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <h3>Selamat datang di <strong>Sistem Pakar</strong></h3>
        <!-- <h1>DETEKSI PINTAR</h1> -->
        <h2>Sistem ini di lengkapi pengetahuan dari pakar terpercaya untuk mengidentifikasi jenis kerusakan komputer</h2>
        <a href="#about" class="btn-get-started scrollto">Lebih Lanjut</a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <img src="<?= base_url('assets/landing/') ?>img/repair.png" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Tentang</h2>
                        <h3>Pelajari Lebih Tentang <span>Sistem Ini</span></h3>
                        <p>Sistem pakar adalah sistem informasi yang mengandung pengetahuan dari satu atau lebih pakar manusia mengenai suatu bidang spesifik.</p>
                    </div>
                    <p>
                        Sistem pakar ini dilengkapi data pengetahuan dari pakar terpercaya.
                    </p>
                    <!-- <ul>

                            <li><i class="ri-check-double-line"></i> Beberapa Jenis Penyakit Jerawat</li>

                        </ul> -->
                    <ul>
                        <li><i class="ri-check-double-line"></i> Gejala beberapa jenis kerusakan komputer</li>
                        <li><i class="ri-check-double-line"></i> identifikasi jenis kerusakan komputer</li>
                        <li><i class="ri-check-double-line"></i> Saran yang harus dilakukan jika terdapat kerusakan komputer</li>
                    </ul>
                </div>

            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Layanan</h2>
                <h3>Sistem ini memiliki beberapa <span>Layanan</span></h3>
                <p>Layanan dibuat untuk admin ataupun pengunjung yang ingin melakukan diagnosa.</p>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-search"></i></div>
                        <h4 class="title"><a href="">Diagnosa Otomatis</a></h4>
                        <p class="description">Pengguna hanya perlu melakukan input data diri dan mengisi kuisioner. Hasil akan muncul secara otomatis.</p>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-brain"></i></div>
                        <h4 class="title"><a href="">Smart Detection</a></h4>
                        <p class="description">Diagnosa penyakit dilakukan menggunakan metode certainty factor menghasilkan hasil beserta nilai kepastianya</p>
                    </div>
                </div>

                <!-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Dashboard Panel</a></h4>
                            <p class="description">Disediakan dashboard panel bagi admin dan pakar untuk melakukan pengelolaan data.</p>
                        </div>
                    </div> -->

                <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Mudah Diakses</a></h4>
                        <p class="description">Kemudahan akses, dan penggunaan. Dapat diakses melalui internet kapan saja dimana saja.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="text-center">
                <h3>Coba Diagnosa Sekarang</h3>
                <p>Anda dapat mencoba melakukan diagnosa sekarang juga, secara gratis tanpa dipungut biaya. Dapatkan diagnosa secara akurat seperti halnya diagnosa dari seorang pakar asli.</p>
                <a class="cta-btn" href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa Sekarang</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <h3>Frequently Asked <span>Questions</span></h3>
                    </div>
                    <ul class="faq-list">
                        <li>
                            <a data-toggle="collapse" class="collapsed" href="#faq1">Apa itu sistem pakar? <i class="icofont-simple-up"></i></a>
                            <div id="faq1" class="collapse" data-parent=".faq-list">
                                <p>
                                    Sistem pakar adalah suatu program komputer yang mengandung pengetahuan dari satu atau lebih pakar manusia mengenai suatu bidang spesifik. Jenis program ini pertama kali dikembangkan oleh periset kecerdasan buatan pada dasawarsa 1960-an dan 1970-an dan diterapkan secara komersial selama 1980-an.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#faq2" class="collapsed">Apa itu metode certainty factor? <i class="icofont-simple-up"></i></a>
                            <div id="faq2" class="collapse" data-parent=".faq-list">
                                <p>
                                    Certainty Factor atau faktor kepastian diperkenalkan pertama kali pada tahun 1975 oleh shortliffe buchanan. Certainty factor adalah suatu metode untuk membuktikan apakah suatu fakta itu pasti ataukah tidak pasti.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#faq3" class="collapsed">Bagaimana cara melakukan diagnosa? <i class="icofont-simple-up"></i></a>
                            <div id="faq3" class="collapse" data-parent=".faq-list">
                                <p>
                                    Anda dapat menuju halaman diagnosa di menu bagian atas, lalu mengisi data diri, dan menjawab kuisioner deteksi penyakit secara jujur. Hasil diagnosa akan ditampilkan secara otomatis.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#faq4" class="collapsed">Apakah hasil diagnosa dapat dipertanggung jawabkan? <i class="icofont-simple-up"></i></a>
                            <div id="faq4" class="collapse" data-parent=".faq-list">
                                <p>
                                    Perhitungan diagnosa dilakukan berdasarkan pengetahuan seorang pakar ahli dalam penyakit dalam, sehingga akurasi diagnosa dapat dipastikan tinggi.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#faq5" class="collapsed">Apakah proses diagnosa dipungut biaya? <i class="icofont-simple-up"></i></a>
                            <div id="faq5" class="collapse" data-parent=".faq-list">
                                <p>
                                    Diagnosa tidak dipungut biaya sepeser pun. Layanan ini dibuat secara gratis untuk mempermudah pekerjaan seorang pakar.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a data-toggle="collapse" href="#faq6" class="collapsed">Untuk apa menginput data diri? <i class="icofont-simple-up"></i></a>
                            <div id="faq6" class="collapse" data-parent=".faq-list">
                                <p>
                                    Data diri digunakan untuk keperluan statistik, seperti mengetahui persebaran deteksi penyakit pada rentang usia tertentu, jenis kelamin tertentu. Data yang anda input akan terjaga kerahasiaannya, dan keamanannya.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 ">
                    <img src="<?= base_url('assets/landing/') ?>img/faq2.png" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End F.A.Q Section -->
</main><!-- End #main -->