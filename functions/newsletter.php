<?php

    function newsletter(){

        if ($_POST["REQUEST_METHOD"] == "POST"){

            // Recebendo o e-mail a cadastrar e validando:
            $email = filter_input(INPUT_POST, "newsletter", FILTER_VALIDATE_EMAIL);

            // Caso tenha inserido algum e-mail válido:
            if (!empty($email)){

                // Conectando na database:
                include 'secret/conn_db.php';

                // Verifica se o e-mail já existe
                $sql = "SELECT * FROM newsletter WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                // Checando se já está cadastrado:
                if ($result->num_rows > 0) {
                    echo "Este e-mail já está cadastrado!";
                    $stmt->close();
                    $conn->close();
                    exit();
                }

                // Cadastrando novo email na tabela:
                $sql = "INSERT INTO newsletter (email) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                echo "E-mail cadastrado com sucesso!";

                $stmt->close();
                $conn->close();

                // Fechando a conexão com a database:
                mysqli_close($conn);

            }
        }
    }


/*
// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Verifica se o e-mail já existe
$sql = "SELECT * FROM newsletter WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Este e-mail já está cadastrado!";
    $stmt->close();
    $conn->close();
    exit();
}

// Insere o e-mail na tabela
$sql = "INSERT INTO newsletter (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

echo "E-mail cadastrado com sucesso!";

$stmt->close();
$conn->close();
*/


?>
