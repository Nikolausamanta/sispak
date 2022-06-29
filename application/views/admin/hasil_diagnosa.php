 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

     <div class="row">
         <div class="col-lg">
             <?= $this->session->flashdata('message'); ?>
             <table id="allPost" class="table table-hover">
                 <thead>
                     <tr>
                         <th scope="col">No</th>
                         <th scope="col">Nama User</th>
                         <th scope="col">Usia</th>
                         <th scope="col">Jenis Kelamin</th>
                         <th scope="col">Penyakit</th>
                         <th scope="col">Tanggal Diagnosa</th>
                         <th scope="col">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($hasil as $row) :
                        ?>
                         <tr>
                             <th scope="row"><?= $no++; ?></th>
                             <td><a><?= $row['nama']; ?></a></td>
                             <td class="align-middle"><?= $row['usia']; ?></td>
                             <td class="align-middle"><?= $row['jenis_kelamin']; ?></td>
                             <td class="align-middle"><?= $row['nama_penyakit']; ?></td>
                             <td class="align-middle"><?= date('d M Y H:i:s', $row['hasil_created']); ?></td>
                             <td>
                                 <a href="<?= base_url('admin/deletehasil/') . $row['id_hasil']; ?>" class="badge badge-danger action-delete">Hapus</a>
                             </td>
                         </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- End of Main Content -->