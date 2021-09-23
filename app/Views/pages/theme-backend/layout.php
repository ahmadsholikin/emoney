<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('favicon');?>/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('favicon');?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('favicon');?>/favicon-16x16.png">
        <!-- Meta -->
        <meta name="description" content="<?=session('nama');?>">
        <meta name="author" content="<?=session('pengembang');?>">
        <script>
            const base_url      = "<?=base_url();?>";
            const backend_url   = "<?=backend_url();?>";
        </script>
        <title><?=session('nama');?></title>
        <!-- vendor css -->
        <link href="<?=base_url('public/backend');?>/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="<?=base_url('public/backend');?>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="<?=base_url('public/backend');?>/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/assets/font/mdi/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/assets/font/ti-icons/css/themify-icons.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/assets/font/simple-line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/datatables.net-bs4/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/toast/src/jquery.toast.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/jconfirm/css/jquery-confirm.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/select2/dist/select2-bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/datepicker/css/bootstrap-datepicker-min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet"  />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/public/plugins/eas/easy-autocomplete.css" rel="stylesheet">
        <link href="<?=base_url('public/backend');?>/assets/css/cassie.css" rel="stylesheet" >
        <link href="<?= base_url(); ?>/public/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
        <script src="<?=base_url('public/backend');?>/lib/jquery/jquery.min.js"></script>
        <link href="<?= base_url(); ?>/public/plugins/dropify/dist/css/dropify.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="sidebar">
            <div class="sidebar-header">
                <div>
                    <a class="navbar-brand brand-logo" href="<?= base_url(); ?>/beranda"><img  style="padding:25px 0;height:auto;width: 100px;" src="<?=base_url();?>/writable/uploads/<?=$_SESSION['logo'];?>" alt="logo" /></a>
                    <!-- <a href="<?=base_url('public/backend');?>/index.html" class="sidebar-logo">
                    <span><?=session('nama');?></span>
                    </a>
                    <small class="sidebar-logo-headline"><?=session('pengembang');?></small> -->
                </div>
            </div>
            <!-- sidebar-header -->
            <?= $this->include('pages/theme-backend/partials/sidebar'); ?>
            <!-- sidebar-body -->
        </div>
        <!-- sidebar -->
        <div class="content">
            <div class="header">
                <div class="header-left">
                    <a href="" class="burger-menu">
                    <i data-feather="menu"></i>
                    </a>
                    <!-- <div class="header-search">
                        <i data-feather="search"></i>
                        <input type="search" class="form-control" placeholder="What are you looking for?">
                    </div> -->
                    <!-- header-search -->
                </div>
                <!-- header-left -->
                <div class="header-right">
                    <a href="" class="header-help-link">
                        <i data-feather="help-circle"></i>
                    </a>
                    <div class="dropdown dropdown-notification">
                        <a href="" class="dropdown-link" data-toggle="dropdown">
                        <i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header">
                                <h6>Notifications</h6>
                                <a href="">
                                    <i data-feather="more-vertical"></i>
                                </a>
                            </div>
                            <!-- dropdown-menu-header -->
                            <div class="dropdown-menu-body">
                                <!--<a href="" class="dropdown-item">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle text-primary bg-primary-light">s</span>
                                    </div>
                                    <div class="dropdown-item-body">
                                        <p>
                                            <strong>Socrates Itumay</strong> marked the task as completed.
                                        </p>
                                        <span>5 hours ago</span>
                                    </div>
                                </a>
                                 <a href="" class="dropdown-item">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle tx-pink bg-pink-light">r</span>
                                    </div>
                                    <div class="dropdown-item-body">
                                        <p>
                                            <strong>Reynante Labares</strong> marked the task as incomplete.
                                        </p>
                                        <span>8 hours ago</span>
                                    </div>
                                </a>
                                <a href="" class="dropdown-item">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle tx-success bg-success-light">d</span>
                                    </div>
                                    <div class="dropdown-item-body">
                                        <p>
                                            <strong>Dyanne Aceron</strong> responded to your comment on this 
                                            <strong>post</strong>.
                                        </p>
                                        <span>a day ago</span>
                                    </div>
                                </a>
                                <a href="" class="dropdown-item">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle tx-indigo bg-indigo-light">k</span>
                                    </div>
                                    <div class="dropdown-item-body">
                                        <p>
                                            <strong>Kirby Avendula</strong> marked the task as incomplete.
                                        </p>
                                        <span>2 days ago</span>
                                    </div>
                                </a> -->
                            </div>
                            <!-- dropdown-menu-body -->
                            <div class="dropdown-menu-footer">
                                <a href="">View All Notifications</a>
                            </div>
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <div class="dropdown dropdown-loggeduser">
                        <a href="" class="dropdown-link" data-toggle="dropdown">
                            <div class="avatar avatar-sm">
                                <img src="<?=$_SESSION['foto'];?>" onerror="this.onerror=null;this.src='https://via.placeholder.com/500/637382/fff';" class="rounded-circle" alt="">
                            </div>
                            <!-- avatar -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-menu-header">
                                <div class="media align-items-center">
                                    <div class="avatar">
                                        <img src="<?=$_SESSION['foto'];?>" onerror="this.onerror=null;this.src='https://via.placeholder.com/500/637382/fff';" class="rounded-circle" alt="">
                                    </div>
                                    <!-- avatar -->
                                    <div class="media-body mg-l-10">
                                        <h6><?=session('username');?></h6>
                                        <span><?=session('group_nama');?></span>
                                    </div>
                                </div>
                                <!-- media -->
                            </div>
                            <div class="dropdown-menu-body">
                                <a href="<?=backend_url();?>/profile" class="dropdown-item">
                                    <i data-feather="user"></i> View Profile
                                </a>
                                <a href="" class="dropdown-item">
                                    <i data-feather="briefcase"></i> Account Settings
                                </a>
                                <a href="<?=base_url();?>/auth/signout" class="dropdown-item">
                                    <i data-feather="log-out"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                </div>
                <!-- header-right -->
            </div>
            <!-- header -->
            <div class="content-header">
                <div style="width:100%">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><?=session('nama');?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#"><?=$activeMenu['root_nama'];?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$activeMenu['menu_nama'];?></li>
                        </ol>
                    </nav>
                    <h5 id="section1" class="tx-semibold"><?=$activeMenu['deskripsi'];?></h5>
                    <hr>
                </div>
            </div>
            <!-- content-header -->
            <div class="content-body">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- content-body -->
        </div>
        <!-- content --> 
    </body>

    <!-- script -->
    <!-- <script src="<?= base_url(); ?>/public/backend/lib/quill/quill.min.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/public/plugins/taginput/tagsinput.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/public/plugins/aos/aos.js"></script> -->
    <!-- <script src="<?=base_url('public/backend');?>/assets/js/parsley.min.js"></script> -->
    <!-- <script src="<?=base_url('public/backend');?>/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->

    <script src="<?= base_url(); ?>/public/plugins/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?=base_url('public/backend');?>/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

    <script src="<?= base_url(); ?>/public/plugins/toast/src/jquery.toast.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/alertify/notify.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/jconfirm/js/jquery-confirm.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/select2/dist/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/validator/validator.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/datepicker/js/bootstrap-datepicker-min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/eas/jquery.easy-autocomplete.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="<?=base_url('public/backend');?>/lib/feather-icons/feather.min.js"></script>
    <script src="<?=base_url('public/backend');?>/lib/js-cookie/js.cookie.js"></script>
    <script src="<?=base_url('public/backend');?>/lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?=base_url();?>/public/plugins/highchart/code/highcharts.js"></script>    
    <script src="<?=base_url();?>/public/plugins/highchart/code/highcharts-more.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/dropify/dist/js/dropify.min.js"></script>

    <script src="<?=base_url('public/backend');?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('public/backend');?>/assets/js/cassie.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/clipboard.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/require.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/page-layout.js"></script>
</html>