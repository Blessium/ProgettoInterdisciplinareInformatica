<?php
$title = "Apple - Prodotti";
include __DIR__ . "/database.php";
include __DIR__ . "/pagine/template.html.php";
$database = Database::get_sigleton();
$lang = $_SESSION['lang'];
$page = $database->getPageInfo("PRODOTTI APPLE", $lang);
$bruh = $page->generateEverything();
echo $bruh;
?>