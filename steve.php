<?php
$title = "Apple - Steve Jobs";
include __DIR__ . "/database.php";
include __DIR__ . "/pagine/template.html.php";
$database = Database::get_sigleton();
$page = $database->getPageInfo("STORIA APPLE");
$bruh = $page->generateEverything();
echo $bruh;
?>