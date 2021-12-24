    <!-------------------------------------WRAPPER OPEN----------------------------------------->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DAFTAR DOSEN</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-------------------------------------WRAPPER OPEN----------------------------------------->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <!-- looping start -->

            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        <?php foreach ($daftar as $key => $value) { ?>
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Dosen Sistem Informasi UAJ
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b><?= $value['nama_dosen']; ?></b></h2>
                                                <p class="text-muted text-sm"><b>Bidang: </b> Web Designer / UI & UX / Data Mining / Business Intelligent </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: Demo Street 123, Demo City 04312, NJ</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telepon : <?= $value['no_hp']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="<?php echo base_url('adminLTE/dist/img/avatar5.png') ?>" alt="user-avatar" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="<?= base_url('mahasiswa/request_bimbingan_proposal/' . $value['id']) ?>" class="btn btn-sm bg-teal <?php

                                                                                                                                                        foreach ($req_proposal as $key => $nilai) { ?><?= $nilai['disabled']; ?><?php  } ?>">
                                                Req Pembimbing Proposal
                                            </a>
                                            <a href="<?= base_url('mahasiswa/request_bimbingan/' . $value['id']) ?>" class="btn btn-sm btn-primary
                                                <?php

                                                foreach ($req_ta as $key => $nilai) { ?><?= $nilai['disabled']; ?><?php  } ?>">

                                                Req Pembimbing TA
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!--looping end-->
                            </div>
                        <?php  } ?>
                    </div>

                </div>

            </div>

            <!-- /.card -->

        </section>
        <!-- /.content -->
        <!-------------------------------------WRAPEER END----------------------------------------->
    </div>
    <!-- /.row  -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-------------------------------------WRAPEER END----------------------------------------->