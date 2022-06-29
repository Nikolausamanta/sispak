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
                <li><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="section">
        <div class="container">
            <h2 class="text-center mb-2 fw-bold">Hasil Diagnosa</h2>
            <hr class="mb-4">
            <div class="pilihan" class="mt-4">
                <h3 style="font-size: 25px" class="mb-2">Pilihan Pengguna</h3>
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($hasil_gejala as $row_gejala) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row_gejala['nama_gejala']; ?></td>
                                <td><?= $row_gejala['nama_kondisi']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="my-4"></div>
            <?php
            $no = 1;
            foreach ($hasil_penyakit as $penyakit) :
                if ($no == 1) :
            ?>
                    <div class="row bg-light rounded-sm my-4">
                        <div class="col-md-6 p-3">
                            <h3 style="font-size: 25px" class="mb-4">Hasil Diagnosa</h3>
                            <p>Berdasarkan daftar gejala yang dipilih, kerusakan komputer anda :</p>
                            <h4 style="font-size: 22px" class="mb-3 text-success"><?= $penyakit['nama_penyakit']; ?></h4>
                            <p style="font-size: 20px" class="text-success">Presentase : <?= number_format($penyakit['nilai_perhitungan'] * 100, 2) . '%'; ?></p>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center p-3">
                            <img src="<?= base_url('assets/img/penyakit/') . $penyakit['gambar_penyakit'] ?>" alt="" width="400px" class="rounded-lg">
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-size: 25px" class="mb-2">Deskripsi penyakit</h3>
                            <br>
                            <?= $penyakit['deskripsi_penyakit']; ?>
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-size: 25px" class="mb-2">Solusi penyakit</h3>
                            <br>
                            <?= $penyakit['saran_penyakit']; ?>
                        </div>
                    </div>
            <?php
                    $no++;
                endif;
            endforeach;
            ?>
            <div class="my-4"></div>
            <div id="kemungkinan" class="mt-4 no-print">
                <div class="card">
                    <div class="card-body">
                        <h3 style="font-size: 25px" class="mb-2">Kemungkinan penyakit lain</h3>
                        <br>
                        <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kemungkinan Penyakit Lain</th>
                                    <th>Presentase</th>
                                </tr>
                            </thead>
                            <tbody id="plain">
                                <?php
                                $nom = 1;
                                if (count($hasil_penyakit) <= 1) {
                                    echo "Tidak ada kemungkinan lain";
                                } else {
                                    $no = 1;
                                    foreach ($hasil_penyakit as $penyakit) :
                                        if ($no != 1) :
                                ?>
                                            <tr>
                                                <td><?= $nom++; ?></td>
                                                <td><?= $penyakit['nama_penyakit']; ?></td>
                                                <td><?= number_format($penyakit['nilai_perhitungan'] * 100, 2) . '%'; ?></td>
                                            </tr>
                                <?php
                                        endif;
                                        $no++;
                                    endforeach;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="<?= base_url('diagnosa/diagnosa'); ?>" class="btn btn-success mt-4">Lakukan Diagnosa Lagi</a>
            </div>
        </div>
    </section>

</main><!-- End #main -->