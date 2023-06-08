<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/users">Users</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid col-11">
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form tambah user</h3>
                        </div>
                        <form action="<?= url_to('register') ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="foto" value="defaultUser.jpg">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" id="fullname" name="fullname" autofocus value="<?= old('fullname'); ?>" placeholder="<?= ($validation->getError('fullname')) ? $validation->getError('fullname') : 'Isi Fullname'; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" value="<?= old('username'); ?>" placeholder="<?= ($validation->getError('username')) ? $validation->getError('username') : 'Isi Username'; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" value="<?= old('email'); ?>" placeholder="<?= ($validation->getError('email')) ? $validation->getError('email') : 'Isi Email'; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" value="<?= old('password'); ?>" placeholder="<?= ($validation->getError('password')) ? $validation->getError('password') : 'Password'; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pass_confirm">Repeat Password</label>
                                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm" value="<?= old('pass_confirm'); ?>" placeholder="<?= ($validation->getError('pass_confirm')) ? $validation->getError('pass_confirm') : 'Repeat Password'; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ml-2 float-right">Submit</button>
                                <button type="reset" class="btn btn-danger ml-2 float-right">Reset</button>
                                <a href="/admin/akun" class="btn btn-warning float-right">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>