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
                <h3 class="card-title">Jadwal Seminar</h3>

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
                                Judul
                            </th>
                            <th class="bg-secondary text-center">
                                Penguji
                            </th>
                            <th class="bg-secondary text-center">
                                Tanggal
                            </th>
                            <th class="bg-secondary text-center">
                                Jam
                            </th>
                            <th class="bg-secondary text-center">
                                Ruang
                            </th>
                            <th class="bg-secondary text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($jadwal_seminar as $key => $value) { ?>
                            <tr>
                                <td class="text-center">
                                    <?= $i++; ?>.
                                </td>
                                <td class="text-center">
                                    <?= $value['mahasiswa']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['judul']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['penguji']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['waktu']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['jam']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['ruang']; ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm " href="#" data-toggle="modal" data-target="#edit<?= $value['id_jadwal'] ?>">
                                        <i class="far fa-edit">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm " href="<?= base_url('admin/delete_jadwal/' . $value['id_jadwal']) ?>">
                                        <i class="far fa-trash-alt">
                                        </i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
                <div class="text-cente mx-auto pl-2 pt-1 font-weight-bolder"><?= $halaman->Links() ?></div>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jadwal Skripsi</h3>

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
                                Judul
                            </th>
                            <th class="bg-secondary text-center">
                                Penguji
                            </th>
                            <th class="bg-secondary text-center">
                                Tanggal
                            </th>
                            <th class="bg-secondary text-center">
                                Jam
                            </th>
                            <th class="bg-secondary text-center">
                                Ruangan/Link
                            </th>
                            <th class="bg-secondary text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($jadwal_sidang as $key => $value) { ?>
                            <tr>
                                <td class="text-center">
                                    <?= $i++; ?>.
                                </td>
                                <td class="text-center">
                                    <?= $value['mahasiswa']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['judul']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['penguji']; ?> <?= '& ' . $value['penguji_2']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['waktu']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['jam']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['ruang']; ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm " href="#" data-toggle="modal" data-target="#edit<?= $value['id_jadwal'] ?>">
                                        <i class="far fa-edit">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm " href="<?= base_url('admin/delete_jadwal/' . $value['id_jadwal']) ?>">
                                        <i class="far fa-trash-alt">
                                        </i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
                <div class="text-cente mx-auto pl-2 pt-1 font-weight-bolder"><?= $halaman->Links() ?></div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal <?= $value['mahasiswa']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/update_jadwal/    ' . $value['id_jadwal']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputName">Judul</label>
                                <input type="text" name="judul" class="form-control text-center" value="<?= $value['judul']; ?>">
                            </div>
                            <label>Penguji 1 </label>
                            <select class="form-control" name="penguji">
                                <option class="text-center"><?= $value['penguji']; ?></option>
                                <?php foreach ($dosen as $c) : ?>
                                    <option class="text-center" value="<?= $c['nama_dosen'] ?>"><?= $c['nama_dosen'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label>Penguji 2 </label>
                            <select class="form-control" name="penguji_2">
                                <option class="text-center"><?= $value['penguji_2']; ?></option>
                                <option class="text-center" value=""> - </option>
                                <?php foreach ($dosen as $c) : ?>
                                    <option class="text-center" value="<?= $c['nama_dosen'] ?>"><?= $c['nama_dosen'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Waktu</label>
                            <input type="date" name="waktu" class="form-control text-center" value="<?= $value['waktu']; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">Jam</label>
                            <input type="time" name="jam" class="form-control text-center" value="<?= $value['jam']; ?>">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">Ruangan/Link</label>
                            <input type="text" name="ruang" class="form-control text-center" value="<?= $value['ruang']; ?>">
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