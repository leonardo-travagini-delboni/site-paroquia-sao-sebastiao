<?php

    function newsletter(){

        if (!empty($_POST["subscribe"])){

            // Recebendo o e-mail a cadastrar e validando:
            $new_email = filter_input(INPUT_POST, "newsletter", FILTER_VALIDATE_EMAIL);

            // Caso tenha inserido algum e-mail válido:
            if (!empty($new_email)){

                // Conectando na database:
                include 'secret/conn_db.php';

                // Verifica se o e-mail já existe
                $sql = "SELECT * FROM newsletter WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $new_email);
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
                $stmt->bind_param("s", $new_email);
                $stmt->execute();
                echo "E-mail cadastrado com sucesso!";

                // Closing connection with the database:
                $stmt->close();
                $conn->close();

            }
            else{
                echo "Por favor insira um e-mail válido."
            }
        }
    }
?>
