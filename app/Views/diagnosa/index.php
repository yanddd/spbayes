<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <form action="/diagnosa/save" method="post">
                    <?php if (count($user) == 0) { ?>
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Isi Biodata</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-4">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Isi biodata</strong> anda terlebih dahulu.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama *</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="<?= ($validation->getError('nama')) ? $validation->getError('nama') : 'Isi nama lengkap anda'; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="<?= ($validation->getError('email')) ? $validation->getError('email') : 'Isi email anda'; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="umur">Umur *</label>
                                            <input type="number" class="form-control <?= ($validation->hasError('umur')) ? 'is-invalid' : ''; ?>" id="umur" name="umur" value="<?= old('umur'); ?>" placeholder="<?= ($validation->getError('umur')) ? $validation->getError('umur') : 'Isi umur anda'; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin *</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input <?= ($validation->hasError('nama_acara')) ? 'is-invalid' : ''; ?>" type="radio" name="jk" id="inlineRadio1" value="Laki-laki">
                                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input <?= ($validation->hasError('nama_acara')) ? 'is-invalid' : ''; ?>" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="position-relative mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Diagnosa Penyakit</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Silahkan memilih gejala</strong> sesuai dengan kondisi anda, jika sudah tekan tombol proses (<i class="fas fa-comment-medical"></i>) di bawah untuk melihat hasil.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <table class="table table-bordered table-striped table-sm">
                                <thead class="table-dark">
                                    <tr style="text-align: center;">
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Gejala</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="cek">
                                    <?= csrf_field(); ?>
                                    <?php
                                    $i = 1;
                                    foreach ($gejala as $g) :
                                    ?>
                                        <tr>
                                            <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                            <td style="text-align: center;"><?= $g['id_gejala']; ?></td>
                                            <td><?= $g['nama_gejala']; ?></td>
                                            <td style="text-align: center;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_gejala[]" value="<?= $g['id_gejala']; ?>">
                                                    <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <button type="submit" class="btn btn-primary" style="position: fixed; display: block; border-radius: 10px; right: 30px; bottom: 80px; z-index: 99;"><i class="fas fa-comment-medical fa-lg"></i></button>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/diagnosa/autogejala',
            method: 'post',
            dataType: 'json',
            success: function(data) {
                datagejala = "";
                var i = 1;
                data.forEach(function(alldata) {
                    datagejala += '<tr><th scope="row" style="text-align: center;">' + i++ + '</th><td style="text-align: center;">' + alldata.id_gejala + '</td><td>' + alldata.nama_gejala + '</td><td style="text-align: center;"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="id_gejala[]" value="' + alldata.id_gejala + '"><label class="form-check-label" for="inlineCheckbox1">Ya</label></div></td></tr>';
                });
                $('#cek').html(datagejala)
            }
        });
    })
</script>

<?= $this->endSection(); ?>