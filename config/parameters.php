<?php
    // Importing envoirement variables (composer require vlucas/phpdotenv):
    require 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Database connections settings:
    $db_server = getenv('DB_SERVER');
    $db_user = getenv('DB_USER');
    $db_pass = getenv('DB_PASS');
    $db_name = getenv('DB_NAME');

    // Global repo parameters:
    $contact_receiver = getenv('CONTACT_RECEIVER');

    // QR CODE copia e cola:
    $pix_qr_code_codigo = getenv('PIX_QR_CODE');
    $pix_qr_code_nome = getenv('PIX_NOME');
    $pix_qr_code_agencia = getenv('PIX_BANCO');
    $pix_qr_code_cnpj = getenv('PIX_CNPJ');
    
?>