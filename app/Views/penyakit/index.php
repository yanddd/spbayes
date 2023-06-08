<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php foreach ($penyakit as $p) : ?>
                        <div class="col-lg-12 mt-3">
                            <div class="row news-lg mx-0 mb-3">
                                <div class="col-md-4 h-100 px-0">
                                    <img class="img-fluid h-100" src="<?= base_url(); ?>/assets/img/<?= $p['foto']; ?>" style="object-fit: cover;">
                                </div>
                                <div class="col-md-8 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <p class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"><?= $p['nama_penyakit']; ?></p>
                                        <?php
                                        $teks = substr($p['desk'], 0, 400);
                                        ?>
                                        <?= $teks . '...</span></div>'; ?>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">

                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="/penyakit/<?= $p['id_penyakit']; ?>"><small class=" ml-3"><i class="far fa-eye mr-2"></i>Detail penyakit</small></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>