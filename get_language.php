<?php
    session_start();
    echo json_encode(array("lang" => $_SESSION['lang']));
?>