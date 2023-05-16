<?php 
    include __DIR__ . "/database.php";
    $db = Database::get_sigleton();
    echo json_encode(array("nigga" => "works"))
?>