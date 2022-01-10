<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jadwal Sidang</h1>
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
                                Ruangan / Link
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
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
                <div class="text-cente mx-auto pl-2 pt-1 font-weight-bolder"><?= $halaman->Links() ?></div>
            </div>
        </div>


</div>

</section>
<!-- /.content -->
</div>