 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

     <!-- Start Rows Card -->
     <div class="row">
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-4 col-md-6 mb-4">
             <div class="card border-left-primary shadow h-100">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Total Penyakit</div>
                             <div class="h5 mb-3 font-weight-bold text-gray-800">
                                 <?= $count_penyakit ?>
                             </div>
                         </div>
                         <div class="col-auto mt-5">
                             <i class="fa-solid fa-2x fa-stethoscope"></i>
                         </div>

                     </div>
                     <a href="<?= base_url('admin/penyakit'); ?>" class="btn btn-primary">
                         Lihat Detail
                     </a>
                 </div>
             </div>
         </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-4 col-md-6 mb-4">
             <div class="card border-left-success shadow h-100">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                 Total Gejala</div>
                             <div class="h5 mb-3 font-weight-bold text-gray-800"><?= $count_gejala ?></div>
                         </div>
                         <div class="col-auto mt-5">
                             <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                             <i class="fa-solid fa-2x fa-syringe"></i>
                         </div>

                     </div>
                     <a href="<?= base_url('admin/gejala'); ?>" class="btn btn-success">
                         Lihat Detail
                     </a>
                 </div>
             </div>
         </div>
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-4 col-md-6 mb-4">
             <div class="card border-left-info shadow h-100">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                 Total Pengetahuan</div>
                             <div class="h5 mb-3 font-weight-bold text-gray-800"><?= $count_pengetahuan ?></div>
                         </div>
                         <div class="col-auto mt-5">
                             <i class="fa-solid fa-2x fa-brain"></i>
                         </div>
                     </div>
                     <a href="<?= base_url('admin/pengetahuan'); ?>" class="btn btn-info">
                         Lihat Detail
                     </a>
                 </div>
             </div>
         </div>

     </div>
     <!-- End Rows Cards -->


     <!-- Start Rows Donat -->
     <div class="row">
         <!-- Donut Chart -->
         <div class="col-xl-4 col-lg-5">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Statistik Berdasarkan Penyakit</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="chart-responsive chart-pie">
                         <canvas id="pieChartPenyakit"></canvas>
                     </div>
                     <hr>
                     <div class="p-0">
                         <ul class="nav nav-pills flex-column">
                             <?php foreach ($hasil_penyakit as $penyakit) : ?>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <?= $penyakit['nama_penyakit']; ?>
                                         <span class="float-right text-info">
                                             <!-- <i class="fas fa-arrow-right text-sm"></i> -->
                                             <?= $penyakit['count_penyakit']; ?>
                                         </span>
                                     </a>
                                 </li>
                             <?php endforeach; ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Donut Chart -->
         <div class="col-xl-4 col-lg-5">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Statistik Berdasarkan Usia</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="chart-responsive chart-pie">
                         <canvas id="pieChartUsia"></canvas>
                     </div>
                     <hr>
                     <div class="p-0">
                         <ul class="nav nav-pills flex-column">
                             <?php foreach ($hasil_usia as $penyakit) : ?>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <?= $penyakit['usia'] . ' tahun'; ?>
                                         <span class="float-right text-info">
                                             <!-- <i class="fas fa-arrow-right text-sm"></i> -->
                                             <?= $penyakit['count_penyakit']; ?>
                                         </span>
                                     </a>
                                 </li>
                             <?php endforeach; ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Donut Chart -->
         <div class="col-xl-4 col-lg-5">
             <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Statistik Berdasarkan Jenis Kelamin</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">
                     <div class="chart-responsive chart-pie">
                         <canvas id="pieChartKelamin"></canvas>
                     </div>
                     <hr>
                     <div class="p-0">
                         <ul class="nav nav-pills flex-column">
                             <?php foreach ($hasil_jenis_kelamin as $penyakit) : ?>
                                 <li class="nav-item">
                                     <a href="#" class="nav-link">
                                         <?= $penyakit['jenis_kelamin']; ?>
                                         <span class="float-right text-info">
                                             <!-- <i class="fas fa-arrow-right text-sm"></i> -->
                                             <?= $penyakit['count_penyakit']; ?>
                                         </span>
                                     </a>
                                 </li>
                             <?php endforeach; ?>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Rows Donat -->

 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- End of Main Content -->