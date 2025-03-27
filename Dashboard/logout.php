<?php
    session_start();
    session_destroy();
    echo "<script>setTimeout(\"location.href = '../login.php';\",10);</script>";
?>