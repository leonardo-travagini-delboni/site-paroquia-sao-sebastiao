<?php
    function sendEmail($contact_name, $contact_email, $contact_telephone, $contact_receiver, $contact_subject, $contact_message, $contact_ip) {
        // Conteúdo do e-mail
        $email_content = "Nome: $contact_name\n";
        $email_content .= "Email: $contact_email\n";
        $email_content .= "Telefone: $contact_telephone\n";
        $email_content .= "IP: $contact_ip\n\n";
        $email_content .= "Mensagem:\n$contact_message\n";

        // Cabeçalho do e-mail
        $headers = "From: $contact_name <$contact_email>";

        // Enviar e-mail
        if (mail($contact_receiver, $contact_subject, $email_content, $headers)) {
            // Redireciona para a mesma página
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Ocorreu um erro ao enviar o e-mail.";
        }
    }
?>
