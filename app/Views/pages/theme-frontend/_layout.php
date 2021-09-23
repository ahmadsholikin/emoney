<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lorem Ipsum | XYZ Sistem</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Google fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700&amp;display=swap">
        <!-- Owl carousel2-->
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/vendor/owl.carousel2/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/vendor/owl.carousel2/assets/owl.theme.default.min.css">
        <!-- Bootstrap Select-->
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/vendor/bootstrap-select/css/bootstrap-select.min.css">
        <!-- Lightbox-->
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/vendor/lightbox2/css/lightbox.min.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="<?=base_url('/public/frontend');?>/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="<?=base_url('/public/frontend');?>/img/favicon.png">
        <link rel="stylesheet" href="<?=base_url();?>/public/assets/font/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?=base_url();?>/public/assets/font/fontawesome-5.10.0/css/all.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
        <!-- navbar-->
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 py-lg-2">
                <div class="container">
                    <a class="navbar-brand py-3 d-flex align-items-center" href="index.html"><img src="<?=base_url('/public/frontend');?>/img/logo.svg" alt="" height="40"></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <!-- Navbar link--><a class="nav-link" href="1.html">Menu #1</a>
                            </li>
                            <li class="nav-item">
                                <!-- Navbar link--><a class="nav-link" href="2.html">Menu #2</a>
                            </li>
                            <li class="nav-item">
                                <!-- Navbar link--><a class="nav-link" href="3.html">Menu #3</a>
                            </li>
                            <li class="nav-item ml-lg-2 py-2 py-lg-0"><a class="btn btn-danger" id="btnLogin" href="#authModal" data-toggle="modal">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--  Modal -->
        <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?=base_url();?>/auth/signin" method="POST">
                    <div class="modal-content">
                        <div class="modal-header px-lg-5">
                            <h5 class="modal-title" id="authModalLabel">Form Login</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body px-lg-5">
                            <label for="">Email Akun</label>
                            <div class="form-group has<?=session('flash_auth_email_class');?>">
                                <div class="input-group">
                                    <div class="input-group-prepend no-border">
                                        <span class="input-group-text icon-md-prepend" id="eye_drop">
                                            <i class="mdi mdi-account"></i>
                                        </span>
                                    </div>
                                    <input type="email" autofocus name="email" required class="form-control form-control-md" id="" minlength="4" 
                                            placeholder="Entrikan email akun Anda..." value="<?=session('flash_auth_email');?>">
                                </div>
                                <?php if(session('flash_auth_email_info')):?>
                                    <label id="email-error" class="error mt-2 text-danger" for="email">
                                        <svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
                                        <?=session('flash_auth_email_info');?>
                                    </label>
                                <?php endif;?>
                            </div>
                            <label for="">Kata sandi</label>
                            <div class="form-group has<?=session('flash_auth_password_class');?>">
                                <div class="input-group">
                                    <div class="input-group-prepend no-border">
                                        <span class="input-group-text icon-md-prepend" id="eye_drop">
                                            <i class="mdi mdi-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" required minlength="5" class="form-control border-right-0 form-control-md no-border-red" id="password" placeholder="Entrikan Kata Sandi..." value="<?=session('flash_auth_password');?>">
                                    <div class="input-group-append" onclick="seePassword()">
                                        <span class="input-group-text icon-md-append" id="eye_drop">
                                            <i class="mdi mdi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <?php if(session('flash_auth_password_info')):?>
                                    <label id="password-error" class="error mt-2 text-danger" for="password">
                                        <svg aria-hidden="true" class="stUf5b qpSchb" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
                                        <?=session('flash_auth_password_info');?>
                                    </label>
                                <?php endif;?>
                            </div>
                            <?= csrf_field() ?>
                        </div>
                        <div class="modal-footer justify-content-start px-lg-5">
                            <button class="btn btn-danger btn-sm" type="submit">Login</button>
                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Hero section-->
        <section class="hero-home py-5">
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-7 mx-auto text-center">
                        <p class="h6 text-uppercase text-danger mb-3">TAGLINE SISTEM INFORMASI</p>
                        <h1 class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit..</h1>
                        <form class="p-2 rounded shadow-sm bg-white" action="#">
                            <div class="input-group">
                                <input class="form-control border-0 mr-2" type="search" placeholder="Lorem ipsum dolor sit amet">
                                <div class="input-group-append rounded">
                                    <button class="btn btn-danger rounded" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features section-->
        <section class="py-5">
            <div class="container py-5">
                <div class="row text-center">
                    <div class="col-lg-10 mx-auto">
                        <div class="card border-0 shadow">
                            <div class="card-body p-5">
                                <div class="row">
                                    <div class="col-lg-4 mb-4 mb-lg-0">
                                        <svg class="svg-icon mb-3 text-danger svg-icon-big">
                                            <use xlink:href="#list-details-1"> </use>
                                        </svg>
                                        <h2 class="h5">Sub Tag Line Informasi #1</h2>
                                        <p class="text-muted text-small mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae debitis delectus atque, quibusdam, natus commodi iste dignissimos.</p>
                                    </div>
                                    <div class="col-lg-4 mb-4 mb-lg-0">
                                        <svg class="svg-icon mb-3 text-danger svg-icon-big">
                                            <use xlink:href="#survey-1"> </use>
                                        </svg>
                                        <h2 class="h5">Sub Tag Line Informasi #2</h2>
                                        <p class="text-muted text-small mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae debitis delectus atque, quibusdam, natus commodi iste dignissimos.</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <svg class="svg-icon mb-3 text-danger svg-icon-big">
                                            <use xlink:href="#stack-1"> </use>
                                        </svg>
                                        <h2 class="h5">Sub Tag Line Informasi #3</h2>
                                        <p class="text-muted text-small mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae debitis delectus atque, quibusdam, natus commodi iste dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer style="background: #111;">
            <div class="container py-4">
                <div class="row py-5">
                    <div class="col-md-4 col-sm-12 mb-3 mb-md-0">
                        <div class="d-flex align-items-center mb-3"><img src="<?=base_url('/public/frontend');?>/img/logo-footer.svg" alt="" width="30"><span class="text-uppercase text-small font-weight-bold text-white ml-2">Budaya Berkemajuan</span></div>
                        <p class="text-muted text-small font-weight-light mb-3">Quasi nostrum porro velit repellat fugiat! Quia, vitae. Hic, Vero ex, suscipit hic, mollitia inventore possimus nisi non nihil.</p>
                        <ul class="list-inline mb-0 text-white">
                            <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
                        <h6 class="pt-2 text-white">Layanan</h6>
                        <div class="d-flex flex-wrap">
                            <ul class="list-unstyled text-muted mb-0 mb-3 mr-4">
                                <li><a class="reset-anchor text-small" href="#">link href #1</a></li>
                                <li><a class="reset-anchor text-small" href="#">link href #2</a></li>
                                <li><a class="reset-anchor text-small" href="#">link href #3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
                        <h6 class="pt-2 text-white">Tentang Aplikasi Sistem</h6>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt at eius alias? Vero ex, suscipit hic, mollitia inventore possimus nisi.</p>
                    </div>
                </div>
            </div>
            <div class="copyrights py-4" style="background: #0e0e0e">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-6 text-lg-left mb-2 mb-md-0">
                            <p class="mb-0 text-muted mb-0 text-small">&copy; <?=date('Y');?> All rights reserved.</p>
                        </div>
                        <div class="col-md-6 col-sm-6 text-md-right">
                            <p class="mb-0 text-muted mb-0 text-small">Dikembangkan oleh XYZ</p>
                            <!-- If you want to remove the backlink, please purchase the Attribution-Free License.-->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- JavaScript files-->
        <script src="<?=base_url('/public/frontend');?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/vendor/owl.carousel2/owl.carousel.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/vendor/lightbox2/js/lightbox.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/js/bootstrap-filestyle.min.js"></script>
        <script src="<?=base_url('/public/frontend');?>/js/front.js"></script>
        <script>
            // ------------------------------------------------------- //
            //   Inject SVG Sprite - 
            //   see more here 
            //   https://css-tricks.com/ajaxing-svg-sprite/
            // ------------------------------------------------------ //
            function injectSvgSprite(path) {
            
                var ajax = new XMLHttpRequest();
                ajax.open("GET", path, true);
                ajax.send();
                ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
                }
            }

            function seePassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            // this is set to BootstrapTemple website as you cannot 
            // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
            // while using file:// protocol
            // pls don't forget to change to your domain :)
            injectSvgSprite('<?=base_url();?>/public/frontend/icons/orion-svg-sprite.svg'); 
           
            <?php if(session('flash_auth_email_class')) : ?>
                $("#btnLogin").click();
            <?php endif;?>
        </script>
    </body>
</html>