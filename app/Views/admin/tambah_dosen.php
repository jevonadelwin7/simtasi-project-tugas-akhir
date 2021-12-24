<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="row ">
            <div class="col-md-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title ">Masukkan Data Dosen</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('auth/regis'); ?>" method="post">
                            <?= csrf_field(); ?>

                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                            <?php endif ?>

                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('success'); ?></div>
                            <?php endif ?>
                            <div class="input-group mb-3">
                                <input type="number" name="no" class="form-control" placeholder="NOD" value="<?= set_value('no') ?>">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nama_user" class="form-control" placeholder="Full name" value="<?= set_value('nama_user') ?>">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama_user') : '' ?></span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" name="no_hp" class="form-control" placeholder="No Telepon" value="<?= set_value('no_hp') ?>">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                <span class=" text-danger"><?= isset($validation) ? display_error($validation, 'no_hp') : '' ?></span>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" name="password1" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <span class=" text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="repassword" class="form-control" placeholder="Retype password" value="<?= set_value('repassword') ?>">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <span class=" text-danger"><?= isset($validation) ? display_error($validation, 'repassword') : '' ?></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success  btn-block">Tambahkan Dosen</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->