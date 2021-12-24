<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal</h1>
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
                                Nama Mahasiswa
                            </th>
                            <th class="bg-secondary text-center">
                                Jenis
                            </th>
                            <th class="bg-secondary text-center">
                                Hari
                            </th>
                            <th class="bg-secondary text-center">
                                Bulan
                            </th>
                            <th class="bg-secondary text-center">
                                Tahun
                            </th>
                            <th class="bg-secondary text-center">
                                Jam
                            </th>
                            <th class="bg-secondary text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr>
                                <td class="text-center">
                                    <?= $i++; ?>.
                                </td>
                                <td class="text-center">
                                    <?= $value['mahasiswa']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['jenis']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['hari']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['bulan']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['tahun']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['jam']; ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm " href="#" data-toggle="modal" data-target="#edit<?= $value['id_jadwal'] ?>">
                                        <i class="far fa-edit">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm " href="#" data-toggle="modal" data-target="#edit<?= $value['id_jadwal'] ?>">
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_jadwal'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/update_jadwal/    ' . $value['id_jadwal']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Hari</label>
                            <select class="form-control" name="hari">
                                <option><?= $value['hari']; ?></option>
                                <option class="text-center" value="Senin">Senin</option>
                                <option class="text-center" value="Selasa">Selasa</option>
                                <option class="text-center" value="Rabu">Rabu</option>
                                <option class="text-center" value="Kamis">Kamis</option>
                                <option class="text-center" value="Jumat">Jumat</option>
                                <option class="text-center" value="Sabtu">Sabtu</option>
                                <option class="text-center" value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bulan</label>
                            <select class="form-control" name="bulan">
                                <option><?= $value['bulan']; ?></option>
                                <option class="text-center" value="Januari">Januari</option>
                                <option class="text-center" value="Februari">Februari</option>
                                <option class="text-center" value="Maret">Maret</option>
                                <option class="text-center" value="April">April</option>
                                <option class="text-center" value="Mei">Mei</option>
                                <option class="text-center" value="Juli">Juli</option>
                                <option class="text-center" value="Juni">Juni</option>
                                <option class="text-center" value="Agustus">Agustus</option>
                                <option class="text-center" value="September">September</option>
                                <option class="text-center" value="Oktober">Oktober</option>
                                <option class="text-center" value="November">November</option>
                                <option class="text-center" value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Tahun</label>
                            <input type="number" name="tahun" class="form-control text-center" value="<?= $value['tahun']; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">Jam</label>
                            <input type="time" name="jam" class="form-control text-center mx-auto" value="<?= $value['jam']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php  } ?>