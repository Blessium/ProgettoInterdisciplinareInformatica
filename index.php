<?php
$title = "Apple - Home";
if (!isset($_SESSION['lang'])) {
    session_start();
    echo "BRUH";
}

include __DIR__ . "/database.php";
include __DIR__ . "/pagine/template.html.php";
include __DIR__ . "/pagine/index.html.php";
?>