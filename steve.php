<?php
$title = "Apple - Steve Jobs";
include __DIR__ . "/database.php";
include __DIR__ . "/pagine/template.html.php";
$database = Database::get_sigleton();
$lang = $_SESSION['lang'];
$page = $database->getPageInfo("STEVE JOBS", $lang);
$bruh = $page->generateEverything();
echo $bruh;
?>