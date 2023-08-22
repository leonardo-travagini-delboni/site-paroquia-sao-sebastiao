<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4">Fale Conosco</h1>
                        </div>
                        <p class="mb-4">Envie abaixo sua mensagem.</p>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo">
                                        <label for="name">Nome Completo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="telephone" class="form-control" id="telephone" name="telephone" placeholder="Telefone">
                                        <label for="telephone">Telefone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                                        <label for="email">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                        <label for="subject">Assunto</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Sua Mensagem" id="message" name="message" style="height: 100px"></textarea>
                                        <label for="message">Sua Mensagem</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="spam-check" name="spam_check" placeholder="5 + 3 = ?">
                                        <label for="spam-check">5 + 3 = ? (Verificação Anti-Spam)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="submit" value="Enviar">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d827.0239637746155!2d-49.218487478797506!3d-21.460195828002526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1691814307817!5m2!1spt-BR!2sbr"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</body>
</html>

<?php
    // Checking if the submit button is pressed:
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Checking if the anti-spam test is correct:
        $contact_spam_check = filter_input(INPUT_POST, "spam_check", FILTER_SANITIZE_SPECIAL_CHARS);
        if ($contact_spam_check == '8'){

            // Getting all the values:
            $contact_name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact_telephone = filter_input(INPUT_POST, "telephone", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact_email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $contact_subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact_message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact_ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);

            // Checking incorret provided values:
            if (empty($contact_email) || empty($contact_email)){
                echo "<span style='color: red; font-weight: bold;'>Por favor, insira pelo menos o telefone ou o e-mail e então clique em Enviar!</span>";
            }
            else{
                if (empty($contact_message)){
                    echo "<span style='color: red; font-weight: bold;'>Por favor, insira a sua mensagem e clique em Enviar!</span>";
                }
                else{

                    // Fixing the empty values before proceeding:
                    if (empty($contact_telephone)){
                        $contact_telephone = "vazio";
                    }
                    if (empty($contact_email)){
                        $contact_email = "vazio@vazio.com";
                    }
                    if (empty($contact_subject)){
                        $contact_subject = "Sem assunto";
                    }

                    // Creating query to check the database:
                    $query_check = "SELECT * FROM faleconosco WHERE user = '{$contact_name}' AND telephone = '{$contact_telephone}' AND email = '{$contact_email}' AND topic = '{$contact_subject}' AND message = '{$contact_message}'";

                    // Importing the necessary parameters:
                    include("config/parameters.php");

                    // Connecting to the database:
                    $result = mysqli_query($conn, $query_check);

                    // Checking if the message was already sent:
                    if (mysqli_num_rows($result) > 0){
                        echo "<span style='color: red; font-weight: bold;'>Mensagem já havia sido enviada anteriormente.</span>";
                    }
                    else{
                        // Creating the query to add the new row:
                        $query_new_row = "INSERT INTO faleconosco (user, telephone, email, topic, message, ip) VALUES ('$contact_name', '$contact_telephone', '$contact_email', '$contact_subject', '$contact_message', '$contact_ip')";

                        // Inserting new message to the database:
                        mysqli_query($conn, $query_new_row);

                        // Importing the e-mail sending funtion:
                        include("function/send_email.php");

                        // Sending the e-mail:
                        $sender_mail = $contact_email;
                        $sender_name = $contact_name;
                        $sender_telephone = $contact_telephone;
                        $receiver_mail = $contact_receiver;

                        // Sending the e-mail:
                        sendEmail($sender_mail, $sender_name, $sender_telephone, $receiver_mail, $contact_subject, $contact_message, $contact_ip);
                        }
                    }
                }
            }
        }
        else{
            echo "<span style='color: red; font-weight: bold;'>Por favor insira o valor correto da soma e tente novamente!</span>";
        }
?>