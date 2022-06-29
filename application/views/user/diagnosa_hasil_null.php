<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="<?= base_url(); ?>">Sistem Pakar</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url(); ?>#about">Tentang</a></li>
                <li><a href="<?= base_url(); ?>#services">Layanan</a></li>
                <li class="active"><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
                <li><a href="<?= base_url('login'); ?>">Login</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->



<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url('diagnosa/diagnosa'); ?>">Hasil Diagnosa</a></li>
            </ol>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <!-- <section id="" class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">


                    <h2 class="">
                        Hasil Diagnosa
                    </h2>

                    <div class="">
                        <div class="alert alert-success">
                            <h5>Sehat!</h5>
                            <img src="<?= base_url('assets/landing/') ?>img/Checklist.png" class="img-fluid" alt="Responsive image" width="23%">
                            Komputer sehat tanpa gejala
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </section> -->
    <!-- End Blog Section -->
    <section id="services" class="services-null">
        <div class="container">

            <div class="section-title">
                <h2>Hasil</h2>
                <h3>Hasil <span>Diagnosa</span></h3>
                <p>Tidak ada satupun gejala yang dipilih oleh pengguna</p>
            </div>

            <div class="col-lg align-items-center mb-5 mb-lg-0">
                <div class="icon-box">
                    <div class="icon"><img src="<?= base_url('assets/landing/') ?>img/Checklist.png" class="img-fluid" alt="Responsive image" width="13%"></div>
                    <h4 class="title"><a href="">Sehat!</a></h4>
                    <p class="description">Komputer sehat tanpa gejala</p>
                </div>
                <a href="<?= base_url('diagnosa/diagnosa'); ?>" class="btn btn-success mt-4">Lakukan Diagnosa Lagi</a>
            </div>


        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->