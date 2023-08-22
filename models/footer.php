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
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Rua São Sebastião, 335, Baumann <br>Novo Horizonte - SP, CEP 14967-264</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(17) 3543-1654</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(17) 99747-9104</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>contato@saosebastiaoparoquia.com.br</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://api.whatsapp.com/send/?phone=5517997479104" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/saosebastiao.matriz" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/sao.sebastiao.paroquia/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UCCdnVASNbY3O1Femu7BS-TQ"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Pastorais</h4>
                    <a class="btn btn-link" href="">General Carpentry</a>
                    <a class="btn btn-link" href="">Furniture Remodeling</a>
                    <a class="btn btn-link" href="">Wooden Floor</a>
                    <a class="btn btn-link" href="">Wooden Furniture</a>
                    <a class="btn btn-link" href="">Custom Carpentry</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Seções</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Assine nossa Newsletter</h4>
                    <p>Fique por dentro das novidades</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Insira seu e-mail" name="newsletter_email">
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

    // Checking the newsletter aplication is active:
    if (isset($_POST["subscribe"])){

        // Getting the email and validating it:
        $newsletter_email = filter_input(INPUT_POST, "newsletter_email", FILTER_VALIDATE_EMAIL);
        
        if (empty($newsletter_email)){
            echo "Por favor, insira um e-mail válido.";
        }

        // Case it is a valid e-mail:
        else{
            echo "Email válido inserido: {$newsletter_email}";                             //  EXCLUDE LINE

            // Connecting to the database:
            include("config/conn_db.php");

            echo "<br>STEP 1";                                                              //  EXCLUDE LINE

            // Checking if the e-mail is already applied:
            $query_check_newsletter = "SELECT * FROM newsletter WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query_check_newsletter);
            mysqli_stmt_bind_param($stmt, 's', $new_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            echo "<br>STEP 2";                                                              //  EXCLUDE LINE

            // In case of duplicates:
            if (mysqli_num_rows($result) > 0) {
                return "<span style='color: red; font-weight: bold;'>E-mail já cadastrado na base.</span>";
            }

            echo "<br>STEP 3";                                                              //  EXCLUDE LINE

            // Adding new e-mail:
            $query_new_row_newsletter = "INSERT INTO newsletter (email) VALUES (?)";
            $stmt = mysqli_prepare($conn, $query_new_row_newsletter);
            mysqli_stmt_bind_param($stmt, 's', $new_email);
            $success = mysqli_stmt_execute($stmt);

            echo "<br>STEP 4";                                                              //  EXCLUDE LINE

            // Closing connection with the database:
            mysqli_close($conn);

            echo "<br>STEP 5";                                                              //  EXCLUDE LINE

            // Final message to the user:
            if ($success) {
                return "E-mail cadastrado com sucesso!";
            } else {
                return "Houve um erro ao cadastrar o e-mail.";
            }
        }
    }
?>