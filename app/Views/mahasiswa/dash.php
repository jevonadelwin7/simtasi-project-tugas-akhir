<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <!-- START ALERTS AND CALLOUTS -->
            <h2 class="mt-4 mb-2">Selamat datang <?= $userInfo['nama_user']; ?> !</h2>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Dosen Pembimbing Proposal</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <?php foreach ($bimbingan as $key => $value) { ?>
                            <div class="card-body">
                                <?= $value['judul']; ?>
                            <?php  } ?>
                            </div>
                            <!-- /.card -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Dosen Pembimbing TA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3">
                    <div class="card card-success ">
                        <div class="card-header">
                            <h3 class="card-title">Judul Tugas Akhir</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            anda belum menentukan judul!
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-3">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Judul Proposal</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <?php foreach ($bimbingan as $key => $value) { ?>
                            <div class="card-body">
                                <?= $value['judul']; ?>
                            <?php  } ?>
                            </div>
                            <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <!-- /.col -->
            </div>

    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->