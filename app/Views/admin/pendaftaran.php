<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar berkas Mahasiswa</h1>

                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>

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
                            <th>
                                No.
                            </th>
                            <th>
                                Nama Mahasiswa
                            </th>
                            <th>
                                Jenis Laporan
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($daftar as $key => $value) { ?>
                            <tr>
                                <td>
                                    <?= $i++; ?>.
                                </td>
                                <td>
                                    <?= $value['mahasiswa']; ?>
                                </td>
                                <td>
                                    <?= $value['jenis']; ?>
                                </td>
                                <td>
                                    <span class="badge badge-<?= $value['status_bg']; ?>"> <?= $value['status']; ?></span>
                                </td>
                                <td class="project-actions" readonly>
                                    <a class="btn btn-info btn-sm" href="<?= base_url('admin/isi_pendaftaran/' . $value['id_pendaftaran']) ?>">
                                        <i class="fas fa-eye">
                                        </i>
                                        Lihat
                                    </a>
                                    <a class="btn btn-danger btn-sm " href="<?= base_url('admin/delete_pendaftaran/' . $value['id_pendaftaran']) ?>">
                                        <i class="far fa-trash-alt">
                                        </i>
                                        Hapus
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->