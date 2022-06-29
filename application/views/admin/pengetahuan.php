        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

            <div class="row">
                <div class="col-lg">
                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>') ?>
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah">Tambah Gejala</a>
                    <table id="allPost" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Penyakit</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col">CF</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengetahuan as $row) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><a><?= $row['nama_penyakit']; ?></a></td>
                                    <td><a><?= $row['nama_gejala']; ?></a></td>
                                    <td><a><?= $row['cf']; ?></a></td>
                                    <td>
                                        <a href="<?= $row['id_basis_pengetahuan']; ?>" class="badge badge-success action-edit">Edit</a> |
                                        <a href="<?= base_url('admin/deletepengetahuan/') . $row['id_basis_pengetahuan']; ?>" class="badge badge-danger action-delete">Hapus</a>
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

        <!-- Modal -->
        <div class="modal fade" id="modal-tambah">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Pengetahuan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="namaPenyakitAdd">Nama Penyakit</label>
                                <select id="namaPenyakitAdd" name="id_penyakit" class="form-control" style="width: 100%;" required>
                                    <option selected value="">Pilih Penyakit</option>
                                    <?php foreach ($penyakit as $row) : ?>
                                        <option value="<?= $row['id_penyakit'] ?>"><?= $row['nama_penyakit'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namaGejalaAdd">Gejala</label>
                                <select id="namaGejalaAdd" name="id_gejala" class="form-control " style="width: 100%;" required>
                                    <option selected value="">Pilih Gejala</option>
                                    <?php foreach ($gejala as $row) : ?>
                                        <option value="<?= $row['id_gejala'] ?>"><?= $row['nama_gejala'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cfPakarAdd">CF PAKAR</label>
                                <input id="cfPakarAdd" type="number" step="0.1" class="form-control" name="cf" placeholder="mb dalam decimal (contoh: 1.0, 0.4, dst)" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit-type" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="edit-modal">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Pengetahuan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="editBody"></div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit-type" class="btn btn-primary" value="Save">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>