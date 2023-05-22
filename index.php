<?php
$title = "Apple - Home";
if (!isset($_SESSION['lang'])) {
    session_start();
    include __DIR__ . "/database.php";
    $t = Database::get_sigleton();
}

include __DIR__ . "/pagine/template.html.php";
include __DIR__ . "/pagine/index.html.php";
?>