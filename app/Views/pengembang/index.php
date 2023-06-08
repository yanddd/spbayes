<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Pengembang Website</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <div class="text-center mb-5">
                            <img class="mb-2" style="width: 90px;" src=" <?= base_url(); ?>/assets2/img/logo.png" alt="Profile headshot" />
                            <h1 class="f3 lh-title mv2 dark-gray">SP Bayes</h1>
                            <div class="mb-3">
                                <button type="button" style="border-radius: 5px;" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Developer">
                                    <i class="fa fa-user"></i> Yandrizal
                                </button>
                            </div>
                            <button type="button" style="border-radius: 5px;" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Psikiater">
                                <i class="fa fa-user-md"></i> dr. Ihsan Fadilah, M.ked., Sp.Kj
                            </button>
                            <button type="button" style="border-radius: 5px;" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Psikolog">
                                <i class="fa fa-user-md"></i> Rani Azmarina, S.Psi., M.Psi., Psikolog
                            </button>
                            <button type="button" style="border-radius: 5px;" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Dosen Pembimbing">
                                <i class="fa fa-user"></i> Medyantiwi Rahmawita, ST, M.Kom
                            </button>
                        </div>
                        <div class="pl-5 pr-5 text-justify">
                            <p>Website Sistem Pakar ini dikembangkan oleh Yandrizal yang merupakan salah satu mahasiswa di Universitas UIN Suska Riau. Terdapat juga beberapa orang yang terlibat dalam pengembangan website ini, yaitu ibu Medyantiwi Rahmawita, ST, M.Kom sebagai dosen pembimbing, bapak dr. Ihsan Fadilah, M.ked., Sp.Kj sebagai pakar 1 dan ibu Rani Azmarina, S.Psi., M.Psi., Psikolog sebagai pakar 2. Website Sistem Pakar ini ditujukan kepada mahasiswa-mahasiswa tingkat akhir yang sedang mengerjakan skripsi untuk membantu mendiagnosa keadaan kesehatan mental mereka.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>