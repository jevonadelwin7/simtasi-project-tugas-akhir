<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Request Bimbingan Tugas Akhir</h1>
                    <div class="kembali mt-4">
                        <?php
                        $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
                        ?>
                        <a href="<?= $url ?>" class="btn btn-success"><i class="fas fa-arrow-left">
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Request Bimbingan Tugas Akhir</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        foreach ($request as $key => $value) { ?>
                            <form action="<?= base_url('dosen/pilihan_request'); ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama Mahasiswa</label>
                                        <input type="text" name="nama_mhs" class="form-control" value="<?= $value['mahasiswa']; ?>" readonly>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="inputName">ID Mahasiswa</label>
                                        <input type="text" name="id_mahasiswa" class="form-control" value="<?= $value['id_mahasiswa']; ?>" readonly>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="inputName">ID dosen</label>
                                        <input type="text" name="id_dosen" class="form-control" value="<?= $value['id_dosen']; ?>" readonly>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="inputName">nama_dosen</label>
                                        <input type="text" name="nama_dosen" class="form-control" value="<?= $userInfo['nama_dosen']; ?>" readonly>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="inputName">ID Bimbingan</label>
                                        <input type="text" name="id_request" class="form-control" value="<?= $value['id_request']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Judul Proposal</label>
                                        <input type="text" name="judul_proposal" class="form-control" placeholder="Isi Judul Proposal Anda" value="<?= $value['judul']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Tentang Judul</label>
                                        <textarea name="tentang_judul" class="form-control" placeholder="Jelaskan secara singkat tentang penelitian Anda." rows="4" value="<?= $value['tentang_judul']; ?>" readonly><?= $value['tentang_judul']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Pesan Mahasiswa</label>
                                        <textarea name="pesan" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4" value="<?= $value['pesan']; ?>" readonly> <?= $value['pesan']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Komentar</label>
                                        <textarea name="komentar_dosen" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4" <?= $value['disabled']; ?>><?= $value['pesan_dosen']; ?> </textarea>
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="inputDescription">jenis</label>
                                        <textarea name="jenis" class="form-control" value="skripsi" rows="4">skripsi</textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" name=submit value="terima" class="btn btn-block btn-success" <?= $value['disabled']; ?>>Terima</button>
                                    <button type="submit" name="submit" value="tolak" class="btn btn-block btn-danger" <?= $value['disabled']; ?>>Tolak </button>
                                    </a>
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