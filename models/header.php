<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- Naming in each specific webpage -->
    <title><?php echo $pageTitle; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- All Favicon Types-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" href="img/favicon.ico">
    <link rel="manifest" href="img/site.webmanifest">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Carregando...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <h6 class="m-0 text-primary">Paróquia São Sebastião</h6>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Rua São Sebastião, 335, Vila Baumann, Novo Horizonte - SP</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>(17) 3543-1654</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>(17) 99747-9104</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1 d-none d-md-inline-block" href="https://api.whatsapp.com/send/?phone=5517997479104" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/saosebastiao.matriz" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.instagram.com/sao.sebastiao.paroquia/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1 d-none d-md-inline-block" href="https://www.youtube.com/channel/UCCdnVASNbY3O1Femu7BS-TQ" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary">São Sebastião</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">INÍCIO</a>
                <a href="sobre.php" class="nav-item nav-link">SOBRE</a>
                <a href="horarios.php" class="nav-item nav-link">HORÁRIOS</a>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">OUTROS</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="igrejas.php" class="dropdown-item">Igrejas</a>
                        <a href="pastorais.php" class="dropdown-item">Pastorais</a>
                    </div>
                </div>
                <a href="contato.php" class="nav-item nav-link">CONTATO</a>
            </div>
            <a href="contribua.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">CONTRIBUA<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    </body>
</html>