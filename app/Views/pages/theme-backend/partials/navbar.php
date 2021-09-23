<?php
$session    = session();
?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="<?= base_url(); ?>/beranda"><img src="<?= base_url('public/upload/logo/logo.png'); ?>" alt="logo" /></a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <a class="navbar-brand brand-logo-mini d-lg-none" style="width:100%" href="<?= base_url(); ?>/beranda">
            <img class="logo-bj" src="<?= base_url('public/upload/logo/logo.png'); ?>" alt="logo" />
        </a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown mx-0 mr-1 animated bounceIn delay-0.85s">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-bell mx-0"></i>

                    <!-- count logs app -->
                    <div class="logs_app_count">

                    </div>

                    <!-- count logs app -->
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header" id="title_notifikasi">Notifikasi</p>
                    <!-- logs app -->
                    <div class="logs_app_list"></div>
                    <!-- logs app -->
                </div>
            </li>
            <li class="nav-item nav-profile dropdown animated bounceIn delay-0.8s">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img onerror="<?= site_url()?>public/upload/profil/<?=session('user_image') ?>" src="<?=$_SESSION['foto'];?>" alt="profile" />
                    <span class="nav-profile-namespan"><?= $session->username; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <p class="text-muted px-2"> <i class="mdi mdi-circle text-success mx-0"></i> User Active : <b><?= $session->username; ?></b> ( <?= $session->group_nama; ?> )</p>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>/profile">
                        <i class="mdi mdi-settings text-primary"></i> Profile User
                    </a>
                    <a class="dropdown-item" href="<?= base_url(); ?>/logout">
                        <i class="mdi mdi-logout text-primary"></i> Logout
                    </a>
                </div>
            </li>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </ul>
    </div>
</nav>