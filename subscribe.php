<?php
$servername = "127.0.0.1:3306";
$username = "u826974739_paroquia";
$password = "tgzik}%@h.=6XdZJ7Z";
$dbname = "u826974739_saosebastiao";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Insere o e-mail na tabela
$sql = "INSERT INTO newsletter (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

echo "E-mail cadastrado com sucesso!";

$stmt->close();
$conn->close();
?>
