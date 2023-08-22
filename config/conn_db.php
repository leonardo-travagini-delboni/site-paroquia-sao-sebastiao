<?php
    // Importing the necessary parameters:
    include("parameters.php");

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }
?>