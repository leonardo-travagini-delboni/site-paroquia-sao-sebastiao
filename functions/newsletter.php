<?php

    function cadastrarNewsletter($email) {
        // Inclua seu arquivo de conexão
        include("config/conn_db.php");

        // Verifique se o e-mail é válido
        $new_email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (empty($new_email)) {
            return "Por favor, insira um e-mail válido.";
        }

        // Verifique se o e-mail já está cadastrado
        $query_check_newsletter = "SELECT * FROM newsletter WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query_check_newsletter);
        mysqli_stmt_bind_param($stmt, 's', $new_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            return "<span style='color: red; font-weight: bold;'>E-mail já cadastrado na base.</span>";
        }

        // Insira o novo e-mail
        $query_new_row_newsletter = "INSERT INTO newsletter (email) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query_new_row_newsletter);
        mysqli_stmt_bind_param($stmt, 's', $new_email);
        $success = mysqli_stmt_execute($stmt);

        // Feche a conexão
        mysqli_close($conn);

        if ($success) {
            return "E-mail cadastrado com sucesso!";
        } else {
            return "Houve um erro ao cadastrar o e-mail.";
        }
    }

    // Se a requisição POST foi enviada, chame a função
    if (!empty($_POST["subscribe"])) {
        $email_subscribe = $_POST["email"];
        $message_subscribe = cadastrarNewsletter($email_subscribe);
        echo $message_subscribe;
    }

?>