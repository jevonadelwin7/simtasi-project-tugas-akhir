<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Bimbingan </h1>
                    <div class="kembali mt-4">

                        <a href="<?= base_url('mahasiswa/bimbingan') ?>" class="btn btn-success"><i class="fas fa-arrow-left">
                            </i> Kembali</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10 mx-auto">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Bimbingan </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <h4>Periksa Entrian Form</h4>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            foreach ($bimbingan as $key => $value) { ?>
                                <form action="<?= base_url('mahasiswa/update_bimbingan/' . $value['id_bimbingan']); ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">Nama Mahasiswa</label>
                                            <input type="text" name="nama_mhs" class="form-control" value="<?= $value['mahasiswa']; ?>" readonly>
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="inputName">Nama dosen</label>
                                            <input type="text" name="dosen" class="form-control" value="<?= $value['dosen']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Judul</label>
                                            <input type="text" name="judul_proposal" class="form-control" value="<?= $value['judul']; ?>">
                                        </div>
                                        <div class="form-group mx-auto">
                                            <label for="exampleInputFile">File Revisi</label>
                                            <div class="isi-file mx-auto"><?= $message; ?>
                                                <!--Iframe-->
                                                <?= $iframeo; ?><iframe class="text-center" src="<?= base_url('uploads/file_dosen/' . $value['file_revisi']) ?>" height="600" width="900" title="Iframe Example"></iframe><?= $iframec; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="berkas" class="form-label">Berkas</label>
                                            <input type="file" class="form-control" id="berkas" name="berkas">
                                            <label for="filesats" class="form-label"><?= $value['file']; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">Catatan Dosen</label>
                                            <textarea name="komentar" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4" readonly> <?= $value['komentar']; ?></textarea>
                                        </div>
                                        <div class=" form-group">
                                            <label for="inputDescription">Pesan Mahasiswa</label>
                                            <textarea name="komentar_mhs" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4"> <?= $value['komentar_mhs']; ?></textarea>
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="inputDescription">idbimbingan</label>
                                            <textarea name="jenis" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4">proposal</textarea>
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="inputDescription">iddosen</label>
                                            <textarea name="id_dosen" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4"><?= $value['id_dosen']; ?></textarea>
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="inputDescription">idmhs</label>
                                            <textarea name="id_mahasiswa" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4"><?= $value['id_mahasiswa']; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <button type="submit" name="submit" value="update" class="btn btn-block btn-warning">Kirim Perubahan</button>
                                        <button type="submit" name="submit" value="insert" class="btn btn-block btn-success">Bimbingan Baru </button>
                                    </div>
                                </form>
                            <?php  } ?>
                        </div>
                        <!-- /.card -->
                        <!-- general form elements -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>
</div>