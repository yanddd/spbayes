<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php

use CodeIgniter\I18n\Time;

?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg mt-3">
                <!-- News Detail Start -->
                <!-- <div class="position-relative mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="w-100 h-100 px-3 d-flex flex-column text-center">
                            <p class="h3 m-0 text-secondary text-uppercase font-weight-bold mb-2">Sistem Pakar <b class="text-primary">SP</b>Bayes</p>
                            <p class="h5 m-0 text-secondary m-2">Diagnosa gangguan kesehatan <br> mental mahasiswa</p>
                            <a href="/diagnosa" class="w-50 btn btn-block btn-primary" style="margin: 0 auto; border-radius: 5px;">Diagnosa</a>
                        </div>


                        <img class="img-fluid mb-3 mr-3 w-50" src="<?= base_url(); ?>/assets2/img/homebg.png" alt="">
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="w-100 h-100 px-3 d-flex flex-column text-justify">
                            <p class="text-secondary mb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab aliquam blanditiis nobis maxime sed neque saepe. Odit, atque est. Cupiditate possimus consequatur sint. Modi ex accusantium iusto deserunt nemo et! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores ratione optio ipsam totam? Nesciunt, sequi ipsum omnis accusamus error molestiae veniam, adipisci dolore nemo atque, porro architecto distinctio ipsa totam.</p>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <div class="d-flex align-items-center mt-3 mb-3">
                            <div class="w-100 h-100 px-3 d-flex flex-column text-center">
                                <p class="h3 m-0 text-secondary text-uppercase font-weight-bold mb-2">Sistem Pakar <b class="text-primary">SP</b>Bayes</p>
                                <p class="h5 m-0 text-secondary mb-4">Diagnosa gangguan kesehatan <br> mental mahasiswa</p>
                                <a href="/diagnosa" class="w-25 btn btn-block btn-primary" style="margin: 0 auto; border-radius: 5px;">
                                    <p class="h6 m-0 text-secondary">Diagnosa</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid mb-3 mr-3 mx-auto" style="width: 355px;" src="<?= base_url(); ?>/assets2/img/homebg.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center bg-primary mb-3" style="height: 100px; border-radius: 15px;">
                            <i class="ml-3 fas fa-user" style="font-size: 50px; color: #1E2024;"></i>
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <p class="h5 m-0 text-secondary text-uppercase font-weight-bold">Pengguna</p>
                                </div>
                                <p class="h3 m-0 text-secondary text-uppercase font-weight-bold"><?= count($pengguna); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center bg-primary mb-3" style="height: 100px; border-radius: 15px;">
                            <i class="ml-3 fas fa-frown" style="font-size: 50px; color: #1E2024;"></i>
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <p class="h5 m-0 text-secondary text-uppercase font-weight-bold"><?= $namstres['nama_penyakit']; ?></p>
                                </div>
                                <p class="h3 m-0 text-secondary text-uppercase font-weight-bold"><?= $stres['id_hasil']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center bg-primary mb-3" style="height: 100px; border-radius: 15px;">
                            <i class="ml-3 fas fa-sad-cry" style="font-size: 50px; color: #1E2024;"></i>
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <p class="h5 m-0 text-secondary text-uppercase font-weight-bold"><?= $namdepresi['nama_penyakit']; ?></p>
                                </div>
                                <p class="h3 m-0 text-secondary text-uppercase font-weight-bold"><?= $depresi['id_hasil']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center bg-primary mb-3" style="height: 100px; border-radius: 15px;">
                            <i class="ml-3 fas fa-tired" style="font-size: 50px; color: #1E2024;"></i>
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <p class="h5 m-0 text-secondary text-uppercase font-weight-bold">Kecemasan</p>
                                </div>
                                <p class="h3 m-0 text-secondary text-uppercase font-weight-bold"><?= $cemas['id_hasil']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>