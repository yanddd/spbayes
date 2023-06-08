<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Bantuan Penggunaan Sistem Pakar</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Cara melihat informasi penyakit</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cara melakukan diagnosa</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cara melihat riwayat diagnosa</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <img class="mt-3 w-100" src="<?= base_url(); ?>/assets2/img/gift1.gif" alt="">
                                    </div>
                                    <div class="col-lg-5">
                                        <p class="m-0 mt-3">1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian menu info penyakit.</p>
                                        <p class="m-0">2. Kemudian akan ditampilkan semua daftar penyakit.</p>
                                        <p class="m-0">3. Selanjutnya tekan tombol detail penyakit, contohnya penyakit stres untuk melihat informasi lengkap tentang penyakit stres.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <img class="mt-3 w-100" src="<?= base_url(); ?>/assets2/img/gift2.gif" alt="">
                                    </div>
                                    <div class="col-lg-5">
                                        <p class="m-0 mt-3">1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian menu diagnosa.</p>
                                        <p class="m-0">2. Selanjutnya silahkan cari gejala yang di rasakan, misalnya memiliki pikiran negatif.</p>
                                        <p class="m-0">3. Tekan opsi ya untuk memilih gejala.</p>
                                        <p class="m-0">4. Selanjutnya jika terdapat gejala lain anda dapat memilih kembali, dan mengisi seperti langkah 2 & 3.</p>
                                        <p class="m-0">5. jika sudah tekan tombol proses (<i class="fas fa-comment-medical"></i>) di bawah untuk melihat hasil.</p>
                                        <p class="m-0">6. Hasil Akan di tampilkan dan penyakit di derita dapat di ketahui.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <img class="mt-3 w-100" src="<?= base_url(); ?>/assets2/img/gift3.gif" alt="">
                                    </div>
                                    <div class="col-lg-5">
                                        <p class="m-0 mt-3">1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian menu riwayat.</p>
                                        <p class="m-0">2. Selanjutnya silahkan cari riwayat yang dilihat, anda dapat menentukan riwayat mana berdasarkan tanggal.</p>
                                        <p class="m-0">3. Tekan tombol detail untuk melihat riwayat.</p>
                                        <p class="m-0">4. Jika sudah akan di arahkan ke hasil diagnosa yang telah di lakukan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>