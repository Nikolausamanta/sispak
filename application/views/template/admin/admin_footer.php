<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Nikolaus Samanta 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/sbadmin/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/sbadmin/'); ?>vendor/chart.js/Chart.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="<?= base_url('assets/sbadmin/'); ?>js/pie-chart.js"></script>
<script src="<?= base_url('assets/sbadmin/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- Font Awesome -->
<script src="<?= base_url('assets/sbadmin/'); ?>js/all.js"></script>

<!-- REQUIRED SCRIPTS -->
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminlte/'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/adminlte/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/adminlte/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url('assets/scripts/globals.js') ?>"></script>



<?php if ($menu == 'beranda') : ?>
    <script>
        // chart penyakit
        var pieChartCanvas = $('#pieChartPenyakit').get(0).getContext('2d')
        var pieData = {
            labels: [
                <?php
                foreach ($hasil_penyakit as $penyakit) {
                    echo "'" . $penyakit['nama_penyakit'] . "',";
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach ($hasil_penyakit as $penyakit) {
                        echo $penyakit['count_penyakit'] . ",";
                    }
                    0
                    ?>
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
            }]
        }

        var pieOptions = {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {

                display: true,
            },
            cutoutPercentage: 80,
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })

        // chart usia
        var pieChartCanvasUsia = $('#pieChartUsia').get(0).getContext('2d')
        var pieDataUsia = {
            labels: [
                <?php
                foreach ($hasil_usia as $penyakit) {
                    echo "'" . $penyakit['usia'] . " tahun',";
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach ($hasil_usia as $penyakit) {
                        echo $penyakit['count_penyakit'] . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
            }]
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChartUsia = new Chart(pieChartCanvasUsia, {
            type: 'doughnut',
            data: pieDataUsia,
            options: pieOptions
        })

        //-----------------
        // - END PIE CHART -
        //-----------------

        var pieChartCanvasKelamin = $('#pieChartKelamin').get(0).getContext('2d')
        var pieDataKelamin = {
            labels: [
                <?php
                foreach ($hasil_jenis_kelamin as $penyakit) {
                    echo "'" . $penyakit['jenis_kelamin'] . "',";
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach ($hasil_jenis_kelamin as $penyakit) {
                        echo $penyakit['count_penyakit'] . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc']
            }]
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        var pieChartKelamin = new Chart(pieChartCanvasKelamin, {
            type: 'doughnut',
            data: pieDataKelamin,
            options: pieOptions
        })
    </script>
<?php endif; ?>



<?php if ($menu == 'pengguna') : ?>
    <script src="<?= base_url('assets/scripts/pengguna.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'penyakit') : ?>
    <script src="<?= base_url('assets/scripts/penyakit.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'penyakit_pakar') : ?>
    <script src="<?= base_url('assets/scripts/penyakit.pakar.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'gejala') : ?>
    <script src="<?= base_url('assets/scripts/gejala.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'gejala_pakar') : ?>
    <script src="<?= base_url('assets/scripts/gejala.pakar.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'kondisi') : ?>
    <script src="<?= base_url('assets/scripts/kondisi.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'kondisi_pakar') : ?>
    <script src="<?= base_url('assets/scripts/kondisi.pakar.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'pengetahuan') : ?>
    <script src="<?= base_url('assets/scripts/pengetahuan.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'pengetahuan_pakar') : ?>
    <script src="<?= base_url('assets/scripts/pengetahuan.pakar.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'diagnosa') : ?>
    <script src="<?= base_url('assets/scripts/diagnosa.js') ?>"></script>
<?php endif; ?>
<?php if ($menu == 'hasildiagnosa') : ?>
    <script src="<?= base_url('assets/scripts/hasil.diagnosa.js') ?>"></script>
<?php endif; ?>
</body>

</html>