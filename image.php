<?php
$image_name = $_GET["image_name"];
$working_dir = getcwd();
$image = $working_dir . "/database/images/";
$image_path = $image . $image_name;

echo $image_name;
echo $image_path;
echo $php_info;

$imageInfo = getimagesize($image_path);
if ($imageInfo !== false) {
    $mimeType = $imageInfo['mime'];
    header("Content-Type: $mimeType");
    echo $mimeType;
} else {
    echo "Invalid or missing image file.";
}


$imageData = file_get_contents($image_path);
if ($imageData !== false) {
    ob_clean();
    echo $imageData;
} else {
    echo "Unable to read image file.";
}

?>