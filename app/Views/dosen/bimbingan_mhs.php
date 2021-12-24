<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BIMBINGAN </h1>
                    <div class="kembali mt-4">

                        <a href="<?= base_url('dosen/bimbingan') ?>" class="btn btn-success"><i class="fas fa-arrow-left">
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

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bimingan Proposal</h3>

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
                                    <a class="btn btn-info btn-sm" href="<?= base_url('dosen/isi_bimbingan/' . $value['id_bimbingan']) ?>">
                                        <i class="fas fa-eye">
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->