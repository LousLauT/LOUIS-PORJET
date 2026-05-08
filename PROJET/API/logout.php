<?php
    session_start();
    session_destroy();
    header("Location: /API/index.php");
    exit();
?>