        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

            <div class="row">
                <div class="col-lg">
                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>') ?>
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah">Tambah Kondisi</a>
                    <table id="allPost" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kondisi</th>
                                <th scope="col">CF</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kondisi as $row) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><a><?= $row['nama_kondisi']; ?></a></td>
                                    <td class="align-middle"><?= $row['cf_kondisi']; ?></td>
                                    <td>
                                        <a href="<?= $row['id_kondisi']; ?>" class="badge badge-success action-edit">Edit</a>
                                        <a href="<?= base_url('admin/deletekondisi/') . $row['id_kondisi']; ?>" class="badge badge-danger action-delete">Hapus</a>
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
        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-tambahLabel">Add New Gejala</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="namaKondisiAdd" name="nama_kondisi" placeholder="Nama Kondisi Baru" required>
                            </div>
                            <div class="form-group">
                                <input id="cf_kondisiAdd" type="number" step="0.1" class="form-control" name="cf_kondisi" placeholder="bobot dalam decimal (contoh: 1.0, 0.4, dst)" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit-type" class="btn btn-primary" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-modal">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Kondisi</h4>
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