<?php
$title = "Apple - Curiosita";
include __DIR__ . "/database.php";
include __DIR__ . "/pagine/template.html.php";
$database = Database::get_sigleton();
$lang = $_SESSION['lang'];
$page = $database->getPageInfo("CURIOSITA", $lang);
$bruh = $page->generateEverything();
echo $bruh;
?>