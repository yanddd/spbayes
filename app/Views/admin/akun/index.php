<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Akun</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Akun</li>
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
                    <h2 class="card-title">List Akun</h2>
                    <a href="/admin/akun/create" class="btn btn-primary float-right">
                        Tambah Akun
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $a) :
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td>
                                        <img src="<?= base_url(); ?>/assets/img/<?= $a['foto']; ?>" class="img-circle elevation-2 mr-2" style="width: 40px; height:40px;" alt="User Image">
                                        <?= $a['username']; ?>
                                    </td>
                                    <td><?= $a['fullname']; ?></td>
                                    <td><?= $a['email']; ?></td>
                                    <td><a class="badge badge-<?= ($a['role'] == 'admin') ? 'success' : 'warning' ?>"><?= strtoupper($a['role']); ?></a></td>
                                    <td>
                                        <?php if ($a['active'] === "1") { ?>
                                            <a class="badge badge-info"><?= strtoupper('Aktif'); ?></a>
                                        <?php } else { ?>
                                            <a class="badge badge-secondary"><?= strtoupper('Tidak Aktif'); ?></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($a['active'] == '0') { ?>
                                            <form action="/admin/akun/<?= $a['userid']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?= $a['userid']; ?>">
                                                <input type="hidden" name="active" value="<?= ($a['active'] == '1') ? 0 : 1 ?>">
                                                <?php if ($a['userid'] !== user()->id && $a['activate_hash'] === '') { ?>
                                                    <button type="submit" class="btn btn-warning btn-circle" id="alert_demo_4"><i class="fas fa-power-off"></i></button>
                                                <?php } else if ($a['userid'] !== user()->id && $a['activate_hash'] !== '') { ?>
                                                    <a type="submit" class="btn btn-secondary btn-circle" id="alert_demo_4"><i class="fas fa-power-off"></i></a>
                                                <?php } ?>
                                            </form>
                                        <?php } else { ?>
                                            <form action="/admin/akun/<?= $a['userid']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?= $a['userid']; ?>">
                                                <input type="hidden" name="active" value="<?= ($a['active'] == '1') ? 0 : 1 ?>">
                                                <?php if ($a['userid'] === user()->id) { ?>
                                                    <a type="submit" class="btn btn-secondary btn-circle" id="alert_demo_4"><i class="fas fa-power-off"></i></a>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-warning btn-circle" id="alert_demo_4"><i class="fas fa-power-off"></i></button>
                                                <?php } ?>
                                            </form>
                                        <?php } ?>

                                        <?php if ($a['userid'] !== user()->id) { ?>
                                            <form action="/admin/akun/<?= $a['userid']; ?>" method="post" class="d-inline" id="formdelakun">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-circle" id="alert_demo_4"><i class="fas fa-trash"></i></button>
                                            </form>
                                        <?php } else { ?>
                                            <a type="submit" class="btn btn-secondary btn-circle" id="alert_demo_4"><i class="fas fa-trash"></i></a>
                                        <?php } ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <!-- <th></th> -->
                                <th>Aksi</th>
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

<script>
    document.querySelector('#formdelakun').addEventListener('submit', function(e) {
        var form = this;

        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin menghapus data?',
            text: "akun akan terhapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>

<?= $this->endSection(); ?>