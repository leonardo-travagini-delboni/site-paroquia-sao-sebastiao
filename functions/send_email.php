<?php

    function sendEmail($sender_mail, $sender_name, $sender_telephone, $receiver_mail, $contact_subject, $contact_message, $contact_ip) {
        
        // Pega a hora corrente
        $current_time = date('Y-m-d H:i:s');

        // Monta a mensagem
        $message = "Nome: $sender_name\n";
        $message .= "Email: $sender_mail\n";
        $message .= "Telefone: $sender_telephone\n";
        $message .= "Hora: $current_time\n";
        $message .= "IP: $contact_ip\n\n";
        $message .= "Mensagem: $contact_message";

        // Cabeçalhos adicionais
        $headers = "From: $sender_mail" . "\r\n" .
                "Reply-To: $sender_mail" . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        // Envia o email
        if(mail($receiver_mail, $contact_subject, $message, $headers)) {
            echo "<span style='color: green; font-weight: bold;'>Mensagem enviada com sucesso! Você será redirecionado a HOMEPAGE em 5 segundos...</span>";
            echo '<meta http-equiv="refresh" content="5;url=index.html">';
        } else {
            echo "<span style='color: red; font-weight: bold;'>Erro ao enviar a mensagem. Retornando à página anterior em 5 segundos...</span>";
            echo '<meta http-equiv="refresh" content="5;url=contact.html">';
        }
    }
?>