<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Mahasiswa</h1>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="bg-secondary text-center">
                                No
                            </th>
                            <th class="bg-secondary text-center">
                                ID
                            </th>
                            <th class="bg-secondary text-center">
                                Nama Mahasiswa
                            </th>
                            <th class="bg-secondary text-center">
                                email
                            </th>
                            <th class="bg-secondary text-center">
                                no_hp
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($daftar as $key => $value) { ?>
                            <tr>
                                <td class="text-center">
                                    <?= $i++; ?>.
                                </td>
                                <td class="text-center">
                                    <?= $value['id']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['nama_user']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['email']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['no_hp']; ?>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
</div>