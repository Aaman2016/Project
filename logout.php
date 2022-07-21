<?php   
    session_start();

    unset($_SESSION["Id"]);

    header("location:index.php");

?>