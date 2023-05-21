<?php
include_once __DIR__ . "/image.php";
class Pagina {
    public $layers;

    public function __construct() { 
        $this->layers = array();
    }
    public function addLayer($layer) {
        $this->layers[] = $layer;
    }

    public function generateEverything() {
        $html = '<div class="container">';
        $html .= '<div class="layer-container">';

        foreach($this->layers as $layer) {
            $html .= '<div class="layer">';
            $html .= '<img class="image" src="/image?image_name='. $layer->image_name . '" alt='. $layer->image_name .'>';
            $html .= '<div>';
            
            $html .= '<div class="title">'. $layer->title .'</div>';
            $html .= '<div class="paragraph">'.$layer->paragraph.'</div>';

            $html .= "</div>";
            $html .= "</div>";
        }

        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }
}

class Layer {
    public string $title;
    public string $paragraph;

    public string $image_name;

    public function __construct($title, $paragraph, $image_name) {
        $this->title = $title;
        $this->paragraph = $paragraph;
        $this->image_name = $image_name;
    }
}

?>
