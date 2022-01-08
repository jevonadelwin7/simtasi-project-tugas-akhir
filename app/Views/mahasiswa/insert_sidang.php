<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul  ?></h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Lengkapi berkas dan kumpulkan</h3>
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


                            <form action="<?= base_url('mahasiswa/daftar'); ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama Mahasiswa</label>
                                        <input type="text" name="nama_mhs" class="form-control" value="<?= $userInfo['nama_user']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">ID Mahasiswa</label>
                                        <input type="text" name="id_mahasiswa" class="form-control" value="<?= $userInfo['id']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Status</label>
                                        <input type="text" name="status" class="form-control bg-secondary text-center" value="Anda belum mengumpulkan berkas.">
                                    </div>
                                    <div class="form-group" hidden>
                                        <label for="inputName">jenis</label>
                                        <input type="text" name="jenis" class="form-control bg-secondary text-center" value="skripsi">
                                    </div>
                                    <div class="mb-3">
                                        <label for="berkas" class="form-label">Berkas</label>
                                        <input type="file" class="form-control" id="berkas" name="berkas">
                                        <label for="filesats" class="form-label"></label>
                                    </div>
                                    <div class=" form-group">
                                        <label for="inputDescription">Pesan Mahasiswa</label>
                                        <textarea name="komentar" class="form-control" placeholder="Harap isi pesan kepada Dosen." rows="4"></textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" name="submit" value="insertt" class="btn btn-block btn-success">Kumpulkan</button>
                                </div>

                        </div>
                        <!-- /.card -->
                        <!-- general form elements -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>
</div>