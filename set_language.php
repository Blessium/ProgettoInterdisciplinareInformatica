<?php
    session_start();
    echo $_POST['lang'];
    $_SESSION['lang'] = $_POST['lang'];
    echo $_SESSION['lang'];
?>