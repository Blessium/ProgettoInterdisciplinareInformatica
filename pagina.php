<?php
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
            $html .= '<img class="image" src="/image/' . $layer->image_id . ' alt="Image">';
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

    public int $image_id;

    public function __construct($title, $paragraph, $image_id) {
        $this->title = $title;
        $this->paragraph = $paragraph;
        $this->image_id = $image_id;
    }
}

?>
