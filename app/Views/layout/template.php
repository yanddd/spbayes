<?php

use CodeIgniter\I18n\Time;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?= base_url(); ?>/assets2/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url(); ?>/assets2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url(); ?>/assets2/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets2/page/pagination.css">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <?php
                            $time = Time::parse(date('F d, Y H:i:s'), 'Asia/Jakarta');
                            ?>
                            <a class="nav-link text-body small" href="#"><?= $time->toLocalizedString('d MMMM, yyyy HH:m'); ?></a><?php  ?>
                        </li>
                        <?php if (!logged_in()) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="/login">Login</a>
                            </li>
                        <?php } ?>
                        <?php if (logged_in()) { ?>
                            <li class="nav-item border-right border-secondary">
                                <a class="nav-link text-body small deleteg" onfocus="deletegejala()" href="#">Logout</a>
                            </li>
                        <?php } ?>
                        <?php if (in_groups('admin')) { ?>
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="/admin">Dashboard</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="/" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">SP<span class="text-secondary font-weight-normal">Bayes</span></h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?= $this->include('layout/navbar'); ?>
    <!-- Navbar End -->

    <!-- Content Start -->
    <?= $this->renderSection('content'); ?>
    <!-- Content End -->

    <!-- Footer Start -->
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="" onclick="return false">2023 Yandrizal ProjectSP Bayes</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Design & Develop by <a href="https://web.facebook.com/yandri.zal.583" onclick="return newfb()">YANDRIZAL</a>
        </p>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets2/lib/easing/easing.min.js"></script>
    <script src="<?= base_url(); ?>/assets2/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url(); ?>/assets2/js/main.js"></script>
    <script src="<?= base_url(); ?>/assets2/search/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (session()->has('logout')) : ?>
        <script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                text: 'Anda Telah Logout',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    <?php endif ?>
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const fotoLabel = document.querySelector('.form-control');
            const imgPreview = document.querySelector('.img-preview');

            fotoLabel.textContent = foto.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

    <?php if (session()->getFlashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Upsss...',
                text: '<?= session()->getFlashdata('error'); ?>',
            })
        </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil...',
                text: '<?= session()->getFlashdata('success'); ?>',
            })
        </script>
    <?php endif; ?>
    <?php if (session()->getFlashdata('empty')) : ?>
        <script>
            Swal.fire({
                icon: 'question',
                title: 'Hmmm...??',
                text: '<?= session()->getFlashdata('empty'); ?>',
            })
        </script>
    <?php endif; ?>

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
                        location.href = "/logout";
                    }
                })
            })
        };
    </script>

    <?php if (session()->getFlashdata('logout')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('logout'); ?>',
            })
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('login')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('login'); ?>',
            })
        </script>
    <?php endif; ?>

    <script>
        function newfb() {
            window.open('https://web.facebook.com/yandri.zal.583')
            return false;
        }
    </script>

</body>

</html>