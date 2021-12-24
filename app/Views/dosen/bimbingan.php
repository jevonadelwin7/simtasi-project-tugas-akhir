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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Mahasiswa</h3>

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
                            <th style="width: 10%">
                                Nama Mahasiswa
                            </th>
                            <th style="width: 10%">
                                Judul
                            </th>
                            <th style="width: 10%">
                                Jenis Bimbingan
                            </th>
                            <th style="width: 1%">
                                aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($bimbingan as $key => $value) { ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>.
                                </td>
                                <td>
                                    <?= $value['mahasiswa']; ?>
                                </td>
                                <td>
                                    <?= $value['judul']; ?>
                                </td>
                                <td>
                                    <?= $value['jenis']; ?>
                                </td>
                                <div class="div" hidden>
                                    <?= $id_dosen = $value['id_dosen'];
                                    $jenis = $value['jenis'];
                                    $id_mahasiswa = $value['id_mahasiswa'];
                                    ?>
                                </div>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('dosen/bimbingan_mhs/' . $id_dosen . '/' . $id_mahasiswa) ?>">
                                        <i class="fas fa-folder">
                                        </i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
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
                            <th style="width: 1%">
                                No
                            </th>
                            <th style="width: 20%">
                                Nama Mahasiswa
                            </th>
                            <th style="width: 40%">
                                Judul
                            </th>
                            <th>
                                Jenis Laporan
                            </th>
                            <th style="width: 10%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($bimbingan_skripsi as $key => $value) { ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>.
                                </td>
                                <td>
                                    <a>
                                        <?= $value['mahasiswa']; ?>
                                    </a>
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
                                    <span class="badge badge-"></span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('dosen/bimbingan_mhs_skripsi/' . $id_dosen . '/' . $id_mahasiswa) ?>">
                                        <i class="fas fa-folder">
                                        </i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->