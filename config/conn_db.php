<?php
    // Importing the necessary parameters:
    include("config/parameters.php");

    // Exception handling (avoiding to display huge messages to the user):
    try{
        //Conecting to the SQL database:
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    // In case of error:
    catch(mysqli_sql_exception){
        echo "<br>INTERNAL ERROR: Connection with the database has failed!"; 
    }
?>