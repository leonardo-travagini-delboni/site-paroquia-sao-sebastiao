<?php
// Verifica a resposta anti-spam
if ($_POST['spam_check'] != '8') {
    echo "Verificação anti-spam incorreta!";
    exit;
}

// Receptores
$to = 'leonardodelboni@gmail.com';

// Assunto
$subject = $_POST['subject'];

// Mensagem
$message = 'Nome: ' . $_POST['name'] . "\n";
$message .= 'Email: ' . $_POST['email'] . "\n";
$message .= 'Mensagem: ' . $_POST['message'];

// Cabeçalhos
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Enviar o email
if (mail($to, $subject, $message, $headers)) {
    echo "Mensagem enviada com sucesso! Você será redirecionado ao Início em 5 segundos...";
    echo '<meta http-equiv="refresh" content="5;url=index.html">';
} else {
    echo "Erro ao enviar a mensagem. Retornando à página anterior em 5 segundos...";
    echo '<meta http-equiv="refresh" content="5;url=contact.html">';
}
?>
