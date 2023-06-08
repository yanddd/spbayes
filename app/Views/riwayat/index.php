<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Riwayat Diagnosa</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="table-dark">
                                <tr style="text-align: center;">
                                    <th scope="col">No</th>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col">Persentase</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="cek">
                                <?php
                                $i = 1;
                                foreach ($riwayat as $g) :
                                ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                        <td><?= $g['nama_penyakit']; ?></td>
                                        <td style="text-align: center;"><?= substr($g['nilai'], 0, 5); ?>%</td>
                                        <td style="text-align: center;">
                                            <a href="/riwayat/<?= $g['id_hasil']; ?>" class="href" onfocus="return newriw()" data-id="<?= $g['id_hasil']; ?>"><small class=" ml-3"><i class="far fa-eye mr-2"></i>Detail</small></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function newriw() {
        $('.href').on('click', function() {
            const id = $(this).data('id');
            window.open('/riwayat/' + id)
            return false;
        })
    }
</script>

<?= $this->endSection(); ?>