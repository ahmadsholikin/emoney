<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#00bcd4">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('favicon');?>/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('favicon');?>/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('favicon');?>/favicon-16x16.png">
        <!-- Meta -->
        <title>PEMUTAKHIRAN DATA MANDIRI PEMKAB MAGELANG</title>
         <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!-- Vendor CSS Files -->
        <link href="<?=base_url();?>/public/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url();?>/public/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="<?=base_url();?>/public/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <!-- <link href="<?=base_url();?>/public/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="<?=base_url();?>/public/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
        <link href="<?=base_url();?>/public/plugins/venobox/venobox.css" rel="stylesheet" >
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" >
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
        <link href="<?=base_url();?>/public/frontend/assets/css/style.css" rel="stylesheet" >
       
    </head>
    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">

            <a href="<?=base_url();?>" class="logo"><img src="<?=base_url();?>/public/assets/image/logo-pdm.png" alt="" class="img-fluid"></a>
            <!-- Uncomment below if you prefer to use text as a logo -->
            <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active animate__animated animate__slideInDown animate__faster" href="<?=base_url();?>#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto animate__animated animate__slideInDown animate__fast" href="<?=base_url();?>#portfolio">Petunjuk</a></li>
                    <li><a class="nav-link scrollto animate__animated animate__slideInDown fast" href="<?=base_url();?>#services">Aturan</a></li>
                    <li><a class="nav-link scrollto animate__animated animate__slideInDown " href="<?=base_url();?>#about">Infografis</a></li>
                    <li><a class="nav-link scrollto animate__animated animate__slideInDown animate__slow" href="<?=base_url();?>#contact">Helpdesk</a></li>
                    <li><a class="nav-link scrollto animate__animated animate__slideInDown animate__slow" href="<?=base_url();?>/rekon">Rekon</a></li>
                    <li><a class="nav-link scrollto animate__animated animate__slideInDown animate__slow" href="<?=base_url();?>/statistik">Statistik</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->
        <?= $this->renderSection('content') ?>
        <footer id="footer">
            <div class="footer-top" id="contact" style="background-color: #f9f9f9;">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>BKPPD MAGELANGKAB</h4>
                            <p>
                            Jln. Soekarno Hatta No. 59 <br>
                            Kota Mungkid, Kabupaten Magelang <br><br>
                            <strong>Kontak:</strong> (0293)-789508<br>
                            <strong>Email:</strong> bkppd@magelangkab.go.id<br>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Link Terkait</h4>
                            <ul>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a href="https://mysapk.bkn.go.id/">MY SAPK</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a href="https://pdm-asn.bkn.go.id/">PDM BKN</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a href="https://www.bkn.go.id/">Badan Kepegawain Negara</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Layanan Situs</h4>
                            <ul>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="#hero">Beranda</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="#portfolio">Petunjuk</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="#services">Aturan</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="#about">Infografis</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="#contact">Helpdesk</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="<?=base_url();?>/rekon">Rekon</a></li>
                                <li class="pb-0"><i class="bx bx-chevron-right"></i> <a class="nav-link scrollto p-1" href="<?=base_url();?>/statistik">Statistik</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Sosial Media</h4>
                            <p>Follow dan pantengin sosial media BKPPD ya, agar tidak ketinggaln informasi terkini</p> 
                            <div class="social-links mt-3">
                                <a href="https://www.instagram.com/bkppdmagelangkab/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="https://www.facebook.com/BKPPDMagelangKab/" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container py-4">
                <div class="copyright">© Copyright 
                    <strong>
                        <span>PDM MAGELANGKAB 2021</span>
                    </strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Dikembangkan Oleh
                    <a href="https://bkppd.magelangkab.go.id/">BKPPD Pemerintah Kabupaten Magelang</a>
                </div>
            </div>
        </footer>
    </body>
    <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-1d76f495-c78b-455f-888e-52876aed5510"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" ><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?= base_url(); ?>/public/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script> -->
    <script src="<?= base_url(); ?>/public/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>/public/frontend/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>/public/frontend/assets/vendor/purecounter/purecounter.js"></script>
    <!-- <script src="<?= base_url(); ?>/public/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script> -->
    <script src="<?= base_url(); ?>/public/frontend/assets/js/main.js"></script>
    <script src="<?= base_url(); ?>/public/backend/lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/venobox/venobox.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?=base_url('public/backend');?>/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.venobox').venobox(); 
        });

        $("#datatable").DataTable({
            pageLength: 100,
        });
        
        $("#askform").submit(function(e) {
            $("#sbmt").prop('value', 'Processing...');
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url  = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data); // show response from the php script.
                    if(data=="true"){
                        swal("Terima kasih", "Permohonan yang Anda ajukan akan kami tindak lanjut.", "success");
                        $(this).find('input[type=text], textarea').val('');
                        $("#sbmt").prop('value', 'Kirim Pesan');
                    }
                    else{
                        swal("Uupps.. Gagal!", "Mohon cek entrian formulir pengajuan pertanyaan Anda", "error");
                    }
                }
            });
        });
    </script>
</html>