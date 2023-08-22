<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Entre em Contato</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Rua São Sebastião, 335, Vila Baumann, Novo Horizonte - SP</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(17) 3543-1654</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(17) 99747-9104</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://api.whatsapp.com/send/?phone=5517997479104" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/saosebastiao.matriz" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/sao.sebastiao.paroquia/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UCCdnVASNbY3O1Femu7BS-TQ"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">São Sebastião</h4>
                    <a class="btn btn-link" href="index.php">Início</a>
                    <a class="btn btn-link" href="sobre.php">Sobre</a>
                    <a class="btn btn-link" href="horarios.php">Horários</a>
                    <a class="btn btn-link" href="igrejas.php">Igrejas</a>
                    <a class="btn btn-link" href="pastorais.php">Pastorais</a>
                    <a class="btn btn-link" href="contato.php">Contato</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Redes Sociais</h4>
                    <a class="btn btn-link" href="https://api.whatsapp.com/send/?phone=5517997479104" target="_blank">Nosso WhatsApp</a>
                    <a class="btn btn-link" href="https://www.facebook.com/saosebastiao.matriz" target="_blank">Nosso Facebook</a>
                    <a class="btn btn-link" href="https://www.instagram.com/sao.sebastiao.paroquia/" target="_blank">Nosso Instagram</a>
                    <a class="btn btn-link" href="https://www.youtube.com/channel/UCCdnVASNbY3O1Femu7BS-TQ" target="_blank">Nosso Youtube</a>
                    <a class="btn btn-link" href="mailto:contato@saosebastiaoparoquia.com.br" target="_blank">Nosso E-mail Principal</a>
                    <a class="btn btn-link" href="https://api.whatsapp.com/send/?phone=5511994421880" target="_blank">Suporte Técnico & TI</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Assine a Newsletter</h4>
                    <p>Fique por dentro das novidades</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Seu e-mail" name="newsletter_email">
                            <input type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" name="subscribe" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="index.html">Paróquia São Sebastião</a>. Todos os direitos reservados.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Desenvolvido por <a class="border-bottom" href="https://www.leonardodelboni.com.br" target="_blank">Leonardo Delboni</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>

<?php
    // Checking the newsletter application is active:
    if (isset($_POST["subscribe"])){

        // Checking if something is written inside the box:
        if(!empty($_POST["newsletter_email"])){

            // Importing the newsletter subscription function:
            include("functions/newsletter.php");
            newsletter_subscription($_POST["newsletter_email"]);
        }
    }
?>