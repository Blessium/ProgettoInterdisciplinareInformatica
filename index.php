<?php
$title = "Apple - Home";
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['lang'] = "english";
}

include __DIR__ . "/database.php";
include __DIR__ . "/pagine/template.html.php";
include __DIR__ . "/pagine/index.html.php";
?>