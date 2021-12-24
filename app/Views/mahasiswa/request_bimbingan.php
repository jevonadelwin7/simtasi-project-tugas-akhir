<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pendaftaran Sidang</h1>
                    <div class="kembali mt-4">

                        <a href="<?= base_url('mahasiswa/daftar_dosen') ?>" class="btn btn-success"><i class="fas fa-arrow-left">
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
                            <h3 class="card-title">Request Bimbingan TA</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('mahasiswa/insert_request_ta'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nama Mahasiswa</label>
                                    <input type="text" name="nama_mhs" class="form-control" value="<?= $userInfo['nama_user']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">ID Dosen</label>
                                    <input type="text" name="id_dosen" class="form-control" value="<?= $idosen ?>" readonly>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="inputName">ID Mahasiswa</label>
                                    <input type="text" name="id_mahasiswa" class="form-control" value="<?= $userInfo['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Judul TA</label>
                                    <input type="text" name="judul_ta" class="form-control" placeholder="Isi Judul TA Anda">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Tentang Judul</label>
                                    <textarea name="tentang_judul" class="form-control" placeholder="Jelaskan secara singkat tentang laporan Anda." rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Pesan</label>
                                    <textarea name="pesan" class="form-control" placeholder="Harap isi pesan kepada Calon Dosen Pembimbing." rows="4"></textarea>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- general form elements -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
</div>