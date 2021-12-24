<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S I M T A S I</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminLTE/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">


    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-dark">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>SIMTA</b>SI</a>
            </div>
            <img src="<?php echo base_url('img/logoatma.gif') ?>" class="mx-auto mt-2" width="100" height="150">
            <div class="card-body">
                <p class="login-box-msg">Silahkan Masuk</p>
                <div class="social-auth-links text-center">
                    <a href="<?= base_url('auth') ?>" class="btn btn-block btn-primary">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Mahasiswa
                    </a>
                    <a href="<?= base_url('auth/admin') ?>" class="btn btn-block btn-success">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>
                        Dosen
                    </a>
                </div>
                <p class="mb-0">

                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('adminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('adminLTE/dist/js/adminlte.min.js ') ?>"></script>
</body>

</html>