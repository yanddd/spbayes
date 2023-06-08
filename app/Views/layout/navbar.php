<?php
$idip = explode("/", current_url());
?>


<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">SP<span class="text-white font-weight-normal">Bayes</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link <?= (current_url() == 'https://spbayes.com/') ? 'active' : ''; ?>">Home</a>
                <a href="/penyakit" class="nav-item nav-link <?= (current_url() == 'https://spbayes.com/penyakit' || current_url() == 'https://spbayes.com/penyakit/' . end($idip)) ? 'active' : ''; ?>">Info Penyakit</a>
                <a href="/diagnosa" class="nav-item nav-link <?= (current_url() == 'https://spbayes.com/diagnosa' || current_url() == 'https://spbayes.com/diagnosa/' . end($idip)) ? 'active' : ''; ?>">Diagnosa Penyakit</a>
                <a href="/riwayat" class="nav-item nav-link <?= (current_url() == 'https://spbayes.com/riwayat' || current_url() == 'https://spbayes.com/riwayat/' . end($idip)) ? 'active' : ''; ?>">Riwayat Diagnosa</a>
                <a href="/pengembang" class="nav-item nav-link <?= (current_url() == 'https://spbayes.com/pengembang') ? 'active' : ''; ?>">Info Pengembang</a>
                <a href="/bantuan" class="nav-item nav-link <?= (current_url() == 'https://spbayes.com/bantuan') ? 'active' : ''; ?>">Bantuan</a>
            </div>
        </div>
    </nav>
</div>