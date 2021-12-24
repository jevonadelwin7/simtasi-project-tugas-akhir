<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BIMBINGAN</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title">Status Request</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                No
                            </th>
                            <th style="width: 20%">
                                Judul Proposal
                            </th>
                            <th style="width: 10%">
                                Jenis
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($status_proposal)) {
                            echo '
                            <tr>
                                <td colspan="6" class="text-center text-danger font-italic ">Anda belum melakukan request bimbingan, harap melakukan request bimbingan pada <a href="/mahasiswa/daftar_dosen"> Daftar dosen</a></a></td>
                                </tr>
                                ';
                        } else {
                            $i = 1;
                            foreach ($status_proposal as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>.
                                    </td>
                                    <td>
                                        <a>
                                            <?= $value['judul']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            <?= $value['jenis']; ?>
                                        </a>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-<?= $value['status_class']; ?>"> <?= $value['status']; ?></span>
                                    </td>
                                    <td class="project-actions text-right" readonly>
                                        <a class="btn btn-info btn-sm" href="<?= base_url('mahasiswa/isi_request/' . $value['id_request']) ?>">
                                            <i class="fas fa-eye">
                                            </i>
                                            Lihat
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="">
                                            <i class="fas fa-trash">
                                            </i>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- Default box -->
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title">Bimbingan Proposal</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                Bimbingan ke-
                            </th>
                            <th style="width: 20%">
                                Judul Proposal
                            </th>
                            <th style="width: 10%">
                                Dosen Pembimbing
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($bimbingan)) {
                            echo '
                            <tr>
                                <td colspan="6" class="text-center text-danger font-italic ">Harap memilih dosen dan melakukan request  bimbingan pada <a href="/mahasiswa/daftar_dosen"> Daftar dosen</a></a></td>
                                </tr>
                                ';
                        } else {
                            $i = 1;
                            foreach ($bimbingan as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $i++; ?>.
                                    </td>
                                    <td>
                                        <a>
                                            <?= $value['judul']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            <?= $value['dosen']; ?>
                                        </a>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success"> no status</span>
                                    </td>
                                    <td class="project-actions text-right" readonly>
                                        <a class="btn btn-info btn-sm" href="<?= base_url('mahasiswa/isi_bimbingan/' . $value['id_bimbingan']) ?>">
                                            <i class="fas fa-eye">
                                            </i>
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Bimbingan TA</h3>

                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                Bimbingan ke-
                            </th>
                            <th style="width: 20%">
                                Judul Skripsi
                            </th>
                            <th style="width: 10%">
                                Dosen Pembimbing
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($bimbingan_ta)) {
                            echo '
                            <tr>
                                <td colspan="6" class="text-center text-danger font-italic ">Harap memilih dosen dan melakukan request  bimbingan pada <a href="/mahasiswa/daftar_dosen"> Daftar dosen</a></a></td>
                                </tr>
                                ';
                        } else {
                            $i = 1;
                            foreach ($bimbingan_ta as $key => $value) { ?>

                                <tr>
                                    <td>
                                        <?= $i++; ?>.
                                    </td>
                                    <td>
                                        <a>
                                            <?= $value['judul']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            <?= $value['dosen']; ?>
                                        </a>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">Success</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="<?= base_url('mahasiswa/isi_bimbingan/' . $value['id_bimbingan']) ?>">
                                            <i class="fas fa-eye">
                                            </i>
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->