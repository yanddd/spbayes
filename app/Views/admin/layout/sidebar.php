<?php
$idip = explode("/", current_url());
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="<?= base_url(); ?>/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">SPBayes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>/assets/img/<?= user()->foto; ?>" class="img-circle elevation-2" style="width: 35px; height: 35px;" alt="User Image">
            </div>
            <div class="info">
                <a href="/admin/profile" class="d-block"><?= user()->fullname; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link <?= (current_url() == 'https://spbayes.com/admin') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/profile" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/profile') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Info Akun
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/akun" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/akun' || current_url() == 'https://spbayes.com/admin/akun/create') ? 'active' : ''; ?>">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>
                            List Akun
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/penyakit" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/penyakit' || current_url() == 'https://spbayes.com/admin/penyakit/' . end($idip)) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-book-medical"></i>
                        <p>
                            List Penyakit
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/gejala" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/gejala') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>
                            List Gejala
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/basisp" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/basisp') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-laptop-medical"></i>
                        <p>
                            Basis Pengetahuan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/pengguna" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/pengguna') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-procedures"></i>
                        <p>
                            List User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/riwayat_pengguna" class="nav-link <?= (current_url() == 'https://spbayes.com/admin/riwayat_pengguna') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-file-medical"></i>
                        <p>
                            Riwayat Diagnosa User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link deleteg" onfocus="deletegejala()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    function deletegejala() {
        $('.deleteg').on('click', function() {
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Sesi anda akan berakhir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/logout',
                        success: function(data) {
                            location.href = "/logout";
                        }
                    });
                }
            })
        })
    };
</script>