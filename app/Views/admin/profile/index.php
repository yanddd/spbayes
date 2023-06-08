<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?php

use CodeIgniter\I18n\Time;

$time = Time::parse(user()->created_at, 'Asia/Jakarta');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Info Akun</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid col-11">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" style="height: 168.5px; width: 168.5px;" src="<?= base_url(); ?>/assets/img/<?= user()->foto; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= user()->username; ?></h3>

                            <p class="text-muted text-center">Site Administrator</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?= user()->email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Fullname</b> <a class="float-right"><?= user()->fullname; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Admin sejak</b> <a class="float-right"><?= $time->toLocalizedString('MMMM d, yyyy');; ?></a>
                                </li>
                            </ul>

                            <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#fotoModal"><b>View full photo</b></a>
                        </div>
                        <div class="modal fade mt-5" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content" style="border-radius: 5%;">
                                    <img src="<?= base_url(); ?>/assets/img/<?= user()->foto; ?>" style="border-radius: 5%;">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link <?php if (session('isEdit')) { ?>msnmsn<?php } elseif (session('isChangePw')) { ?>scs<?php } else { ?>active<?php } ?>" href=" #edit" data-toggle="tab">Edit</a></li>
                                <li class="nav-item"><a class="nav-link <?= session('isChangePw') ? 'active' : '' ?>" href="#password" data-toggle="tab">Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane <?php if (session('isEdit')) { ?>nbadmnasbd<?php } elseif (session('isChangePw')) { ?>snfsnff<?php } else { ?>active<?php } ?>" id="edit">
                                    <form action="/admin/profile/update" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="fotoLama" value="<?= user()->foto; ?>">
                                        <div class="form-group row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" value="<?= user()->username; ?>" placeholder="<?= $validation->getError('username'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" value="<?= user()->email; ?>" placeholder="<?= $validation->getError('email'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" id="fullname" name="fullname" value="<?= user()->fullname; ?>" placeholder="<?= $validation->getError('fullname'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="custom-file col-sm-9 ml-2">
                                                <input class="form-control <?php if (session('errors.foto')) : ?>is-invalid<?php endif ?>" type="file" id="foto" name="foto" value="<?= user()->foto; ?>" placeholder="<?= $validation->getError('foto'); ?>" onchange="previewImg()">
                                                <label class="custom-file-label" for="foto"><?= user()->foto; ?></label>
                                                <img src="<?= base_url(); ?>/assets/img/<?= user()->foto; ?>" class="img-thumbnail img-preview mt-3" style="height: 110px; width: 120px;">
                                            </div>
                                            <!-- <div style="width: 10%; max-width: 167px;">

                                            </div> -->
                                            <div class="">

                                            </div>

                                        </div>

                                        <div class="form-group row" style="margin-top: 140px;">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane <?= session('isChangePw') ? 'active' : '' ?>" id="password">
                                    <form action="/admin/profile/changepass" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="current_pass" class="col-sm-3 col-form-label">Current Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control <?php if (session('errors.current_pass')) : ?>is-invalid<?php endif ?>" name="current_pass" placeholder="<?php if (!$validation->getError('current_pass')) { ?>Password Sekarang<?php } else { ?><?= $validation->getError('current_pass'); ?><?php } ?> <?= $validation->getError('verify'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="new_pass" class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control <?php if (session('errors.new_pass')) : ?>is-invalid<?php endif ?>" name="new_pass" placeholder="<?php if (!$validation->getError('new_pass')) { ?>Password Baru<?php } else { ?><?= $validation->getError('new_pass'); ?><?php } ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="repeat_pass" class="col-sm-3 col-form-label">Repeat New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control <?php if (session('errors.repeat_pass')) : ?>is-invalid<?php endif ?>" name="repeat_pass" placeholder="<?php if (!$validation->getError('repeat_pass')) { ?>Repeat Password Baru<?php } else { ?><?= $validation->getError('repeat_pass'); ?><?php } ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

</div>

<?= $this->endSection(); ?>