<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?= base_url(); ?>/assets/img/<?= $penyakit['foto']; ?>" style="object-fit:cover; width: 700px; height: 500px">
                    <div class="bg-white border border-top-0 p-4">
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?= $penyakit['nama_penyakit']; ?></h1>
                        <?= $penyakit['desk']; ?> <br>
                        <p>Gejala diantaranya yaitu:</p>
                        <?php $i = 1;
                        foreach ($gejala as $g) { ?>
                            <p class="pl-4" style="margin-bottom: 5px;"><?= $i++; ?>. <?= $g['nama_gejala']; ?></p>
                        <?php   } ?>
                        <p class="mt-3"><?= $penyakit['saran']; ?></p>
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">

                        </div>
                        <div class="d-flex align-items-center">

                            <div id="jumKom">
                                <a href="/penyakit"><span class="ml-3"><i class="fas fa-backward mr-2"></i>Back</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>