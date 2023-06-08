<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .callout {
        background-color: #fff;
        border: 1px solid #e4e7ea;
        border-left: 4px solid #c8ced3;
        border-radius: .25rem;
        margin: 1rem 0;
        padding: .75rem 1.25rem;
        position: relative;
    }

    .callout h4 {
        font-size: 1.3125rem;
        margin-top: 0;
        /* margin-bottom: .8rem */
    }

    .callout p:last-child {
        margin-bottom: 0;
    }

    .callout-default {
        border-left-color: #777;
        background-color: #F2F2F2;
    }

    .callout-default h4 {
        color: #FFCC00;
    }
</style>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Detail Riwayat</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <h5 class="mb-3 text-secondary text-uppercase font-weight-bold">Daftar Gejala</h5>
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="table-dark">
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Gejala</th>
                                </tr>
                            </thead>
                            <tbody id="cek">
                                <?php
                                $i = 1;
                                foreach ($hasilD as $hd) :
                                ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                        <td style="text-align: center;"><?= $hd['id_gejala']; ?></td>
                                        <td><?= $hd['nama_gejala']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <h5 class="mb-3 text-secondary text-uppercase font-weight-bold">Nama penyakit</h5>
                        <div class="callout callout-default alert-dismissible">
                            <p>Kemungkinan jenis Gangguan kesehatan mental yang diderita adalah:</p>
                            <h4><?= $hasilP[0]['nama_penyakit']; ?> / <?= substr($hasilP[0]['nilai'], 0, 5); ?>%</h4>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header text-white bg-info"><b>Detail</b></div>
                            <div class="card-body">
                                <p class="card-text"><?= $hasilP[0]['desk']; ?></p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header text-white bg-warning"><b>Saran</b></div>
                            <div class="card-body">
                                <p class="card-text"><?= $hasilP[0]['saran']; ?></p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header text-white bg-danger"><b>Kemungkinan lain</b></div>
                            <div class="card-body">
                                <?php
                                foreach ($pLain as $p) {
                                    if ($p['id_penyakit'] != $maxN) { ?>
                                        <b><i class="fas fa-plus-square"></i> <?= $p['nama_penyakit']; ?> / <?= substr($p['nilai'], 0, 5); ?>%<br></b>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>