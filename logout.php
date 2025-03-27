<?php
    session_start();
    session_destroy();
    // Redirect to the login page, login page out of the folder
    header("Location: ../login.php");
    exit();
    
?>