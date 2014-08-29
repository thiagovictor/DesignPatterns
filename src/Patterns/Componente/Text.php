<?php


namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Text implements ComponenteInterface{
    
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }
    
    public function gerarHtml() {
        return $this->text;
    }
    
    public function setText($text) {
        $this->text = $text;
        return $this;
    }
}
