<?php

    // Declaring the newsletter subscription function:
    function newsletter_subscription($newsletter_email){

        // Getting the email and validating it:
        $newsletter_email = filter_input(INPUT_POST, "newsletter_email", FILTER_VALIDATE_EMAIL);
            
        if (empty($newsletter_email)){
            echo "<script>alert('Por favor, insira um e-mail válido.');</script>";
        }
        
        // Case it is a valid e-mail:
        else{
            // Connecting to the database:
            include("config/conn_db.php");

            // Checking if the e-mail is already applied:
            $query_check_newsletter = "SELECT * FROM newsletter WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query_check_newsletter);
            mysqli_stmt_bind_param($stmt, 's', $newsletter_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // In case of duplicates:
            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert(\"E-mail já cadastrado na base.\");</script>";
            }
            // Adding new e-mail:
            else {
                $query_new_row_newsletter = "INSERT INTO newsletter (email) VALUES (?)";
                $stmt = mysqli_prepare($conn, $query_new_row_newsletter);
                mysqli_stmt_bind_param($stmt, 's', $newsletter_email);
                $success = mysqli_stmt_execute($stmt);

                // Closing connection with the database:
                mysqli_close($conn);

                // Final message to the user:
                if ($success) {
                    echo "<script>alert('E-mail cadastrado com sucesso!');</script>";
                } else {
                    echo "<script>alert('Houve um erro ao cadastrar o e-mail.');</script>";
                }
            }
        }
    }
?>