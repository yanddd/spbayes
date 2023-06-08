<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Riwayat User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Riwayat User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid col-11">

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Data Riwayat User</h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Penyakit</th>
                                <th>Persentase</th>
                                <th>Gejala</th>
                                <th>Kemungkinan Lain</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($riwayat as $a) :
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['email']; ?></td>
                                    <td><?= $a['nama_penyakit']; ?></td>
                                    <td><?= substr($a['nilai'], 0, 5); ?>%</td>
                                    <td class="col-3">
                                        <?php
                                        $gejala = unserialize($a['gejala']);
                                        foreach ($allG as $ag) {
                                            $namaG[$ag['id_gejala']] = $ag['nama_gejala'];
                                        }

                                        foreach ($gejala as $key) {
                                            $dataGejala[] = [
                                                'id_hasil' => $a['id_hasil'],
                                                'id_gejala' => $key,
                                                'nama_gejala' => $namaG[$key],
                                            ];
                                        }
                                        ?>
                                        <select class="form-control">
                                            <option><?php for ($i = 0; $i < count($gejala); $i++) {
                                                        echo $gejala[$i] . ", ";
                                                    } ?></option>
                                            <?php foreach ($dataGejala as $dg) : ?>
                                                <?php if ($dg['id_hasil'] == $a['id_hasil']) { ?>
                                                    <option disabled><?= $dg['nama_gejala']; ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>

                                        </select>
                                    </td>
                                    <td class="col-2">
                                        <?php
                                        $arpenyakit = unserialize($a['penyakit']);
                                        foreach ($allP as $ap) {
                                            $arpkt[$ap['id_penyakit']] = $ap['nama_penyakit'];
                                        }

                                        foreach ($arpenyakit as $key => $value) {
                                            $dataPenyakit[] = [
                                                'id_hasil' => $a['id_hasil'],
                                                'id_penyakit' => $key,
                                                'nama_penyakit' => $arpkt[$key],
                                                'nilai' => $value
                                            ];
                                        }
                                        ?>
                                        <select class="form-control">
                                            <option><?php
                                                    foreach ($dataPenyakit as $dps) {
                                                        if ($dps['id_hasil'] == $a['id_hasil'] && $dps['id_penyakit'] != $a['penyakitsatu']) {
                                                            echo $dps['id_penyakit'] . ", ";
                                                        }
                                                    }
                                                    ?></option>
                                            <?php foreach ($dataPenyakit as $dp) : ?>
                                                <?php if ($dp['id_hasil'] == $a['id_hasil'] && $dp['id_penyakit'] != $a['penyakitsatu']) { ?>
                                                    <option disabled><?= $dp['nama_penyakit']; ?> (<?= substr($dp['nilai'], 0, 5); ?>%)</option>
                                                <?php } ?>
                                            <?php endforeach; ?>

                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Penyakit</th>
                                <th>Persentase</th>
                                <th>Gejala</th>
                                <th>Kemungkinan Lain</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>