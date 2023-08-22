<?php

    function send_mail($contact_name, $contact_email, $contact_telephone, $contact_subject, $contact_message, $contact_receiver){

        // Conteúdo do e-mail
        $email_content = null;
        $email_content = "Nome: $contact_name\n";
        $email_content .= "Email: $contact_email\n";
        $email_content .= "Telefone: $contact_telephone\n";
        $email_content .= "Mensagem:\n$contact_message\n";

        // Cabeçalho do e-mail
        $headers = "From: $contact_name <$contact_email>";

        // Enviar e-mail:
        require 'config/parameters.php';
        if (mail($contact_receiver, $contact_subject, $email_content, $headers)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            echo "Mensagem enviada com sucesso.";
            return true;
        } 
        else {
            echo "Ocorreu um erro ao enviar o e-mail.";
            return false;
        }

    }

?>