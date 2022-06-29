        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

            <div class="row">
                <div class="col-lg">

                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah">Tambah Penyakit</a>
                    <table id="allPost" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Penyakit</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($penyakit as $row) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><a><?= $row['nama_penyakit']; ?></a></td>
                                    <td>
                                        <a href="<?= $row['id_penyakit']; ?>" class="badge badge-success action-edit">Edit</a>
                                        <a href="<?= base_url('admin/deletepenyakit/') . $row['id_penyakit']; ?>" class="badge badge-danger action-delete">Hapus</a>
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

        <<div class="modal fade" id="modal-tambah">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Penyakit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="namaPenyakitAdd">Nama Penyakit</label>
                                <input id="namaPenyakitAdd" type="text" class="form-control" name="nama_penyakit" placeholder="nama penyakit baru" required>
                            </div>
                            <!-- <div class="form-group">
                        <label for="deskripsiAdd">Deskripsi</label>
                        <textarea name="deskripsi_penyakit" id="deskripsiAdd" cols="30" rows="5" class="form-control" placeholder="masukkan deskripsi penyakit" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="saranAdd">Saran</label>
                        <textarea name="saran_penyakit" id="saranAdd" cols="30" rows="5" class="form-control" placeholder="masukkan saran penyakit" required></textarea>
                    </div> -->
                            <div class="form-group">
                                <label for="penyakitArtikel">Deskripsi Penyakit</label>
                                <textarea id="penyakitArtikel" cols="30" rows="5" class="form-control" name="deskripsi_penyakit" placeholder="masukkan deskripsi tentang penyakit disini"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="penyakitSaranArtikel">Saran Penyakit</label>
                                <textarea id="penyakitSaranArtikel" cols="30" rows="5" class="form-control" name="saran_penyakit" placeholder="masukkan saran tentang penyakit disini"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="customFile">Choose Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="penyakitImage" accept="image/x-png,image/gif,image/jpeg" name="gambar_penyakit" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <img style="object-fit: cover; height: 100px; width: 150px;" width="150px" height="100px" src="" alt="penyakit" id="penyakitPreview" class="img-fluid mt-2 d-none">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" name="submit-type" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="edit-modal">
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Penyakit</h4>
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