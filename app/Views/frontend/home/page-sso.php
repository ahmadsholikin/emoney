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
        <title>eXcode</title>
        <link rel="stylesheet" href="<?=base_url();?>/public/backend/assets/css/cassie.css">
        <script src="<?=base_url('public/backend');?>/lib/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/public/plugins/sweetalert/sweetalert.min.js"></script>
        <style>
            .btn-eye{
                font-size: 12px;
                font-weight: 300;
                border-bottom: 2px solid #d9dfe7;
                color: #94989e;
                background: transparent;
            }

            .btn-eye:focus{
                outline: 0px dotted;
                outline: 0px auto -webkit-focus-ring-color;
                border-color: #d9dfe760;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="signin-sidebar-body">
                        <a href="#" class="sidebar-logo mg-b-40">
                            <span>Dashboard Layanan Sistem</span>
                        </a>
                        <h5 >Selamat Datang!</h5>
                        <p>Silakan masuk dengan Akun anda.</p>
                        <form action="<?=base_url();?>/auth/signin" method="POST">
                            <?= csrf_field() ?>
                            <div class="signin-form">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="email" class="form-control" placeholder="Entrikan Username Anda">
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-between">
                                        <span>Password</span>
                                        <a href="" class="tx-13">Lupa kata sandi?</a>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Entrikan password SSO Anda">
                                        <span class="btn-eye" id="btn-eye" type="button" onclick="changeType()">
                                            <i data-feather="eye-off"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group d-flex mg-b-0">
                                    <button class="btn btn-brand-01 btn-uppercase flex-fill" type="submit">Masuk</button>
                                    <a href="#" class="btn btn-white btn-uppercase flex-fill mg-l-10">Registrasi</a>
                                </div>
                                <div class="divider-text mg-y-30">Or</div>
                                <a href="#" class="btn btn-danger btn-uppercase btn-block">Login with GMAIL</a>
                            </div>
                        </form>
                        <p class="mg-t-auto mg-b-0 tx-sm tx-color-03">Dikembangkan oleh 
                            <a href="">Kasbiystud.io</a>
                            <br>Rilis Versi 1.0
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?=base_url('public/backend');?>/lib/feather-icons/feather.min.js"></script>
    <script>
        feather.replace();

        function changeType(){
            const tipe = document.getElementById('password').type;
            if(tipe=='password')
            {
                document.getElementById('password').type = 'text';
                $(".btn-eye svg.feather.feather-eye-off").replaceWith(feather.icons.eye.toSvg());
                feather.replace();
            }
            else
            {
                document.getElementById('password').type = 'password';
                $(".btn-eye svg.feather.feather-eye").replaceWith(feather.icons['eye-off'].toSvg());
                feather.replace();
            }
        }
    </script>
    <?php if(!empty(session()->getFlashdata('flash_info'))):?>
        <script>
            swal("Uupps.. Login Gagal!", "username dan password yang Anda masukkan salah", "error");
        </script>
    <?php endif;?>
</html>