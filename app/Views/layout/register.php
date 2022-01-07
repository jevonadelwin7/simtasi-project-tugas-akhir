<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Akun | Mahasiswa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminLTE/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>SIMTA</b>SI</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrasi</p>

                <form action="<?= base_url('auth/save'); ?>" method="post">
                    <?= csrf_field(); ?>

                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>

                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif ?>

                    <div class="input-group mb-3">
                        <input type="number" name="no" class="form-control" placeholder="NIM/NOD" value="<?= set_value('no') ?>">

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
                    </div>
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    <div class="input-group mb-3">
                        <input type="number" name="no_hp" class="form-control" placeholder="No Telepon" value="<?= set_value('no_hp') ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>

                    </div>
                    <span class=" text-danger"><?= isset($validation) ? display_error($validation, 'no_hp') : '' ?></span>

                    <div class="input-group mb-3">
                        <input type="password" name="password1" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>
                    <span class=" text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                    <div class="input-group mb-3">
                        <input type="password" name="repassword" class="form-control" placeholder="Retype password" value="<?= set_value('repassword') ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class=" text-danger"><?= isset($validation) ? display_error($validation, 'repassword') : '' ?></span>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary  btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="<?= base_url() ?>" class="text-center">
                    <-kembali ke halaman Login</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('adminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('adminLTE/dist/js/adminlte.min.js ') ?>"></script>
</body>

</html>