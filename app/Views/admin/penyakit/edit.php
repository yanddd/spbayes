<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Data Penyakit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/penyakit">List Penyakit</a></li>
                        <li class="breadcrumb-item active">Ubah Data Penyakit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid col-11">
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Ubah Data</h3>
                        </div>

                        <form action="/admin/penyakit/update/<?= $datapenyakit['id_penyakit']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="fotoLama" value="<?= $datapenyakit['foto']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_penyakit">Nama Penyakit</label>
                                    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" autofocus value="<?= (old('nama_penyakit')) ? old('nama_penyakit') : $datapenyakit['nama_penyakit'] ?>" placeholder="<?php if (!$validation->getError('nama_penyakit')) { ?>Tidak boleh kosong<?php } else { ?><?= $validation->getError('nama_penyakit'); ?><?php } ?>">
                                    <div class="salah">
                                        <?= $validation->getError('nama_penyakit'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desk">Deskipsi</label>
                                    <div class="card-body">
                                        <textarea id="summernote" name="desk"><?= (old('desk')) ? old('desk') : $datapenyakit['desk'] ?></textarea>
                                    </div>
                                    <div class="salah">
                                        <?= $validation->getError('desk'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="saran">Penanganan dan saran</label>
                                    <div class="card-body">
                                        <textarea id="summernote2" name="saran"><?= (old('saran')) ? old('saran') : $datapenyakit['saran'] ?></textarea>
                                    </div>
                                    <div class="salah">
                                        <?= $validation->getError('saran'); ?>
                                    </div>
                                </div>

                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <label for="foto">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()">
                                            <label class="custom-file-label" for="foto"><?= $datapenyakit['foto'] ?></label>
                                        </div>
                                    </div>
                                    <div class="salah">
                                        <?= $validation->getError('foto'); ?>
                                    </div>
                                    <div class="colom-sm-2">
                                        <img src="<?= base_url(); ?>/assets/img/<?= $datapenyakit['foto'] ?>" class="img-thumbnail img-preview mt-3" style="height: 110px; width: 200px">
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ml-2 float-right">Submit</button>
                                <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
                                <a href="/admin/penyakit" class="btn btn-warning float-right">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>