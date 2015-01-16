<?php

namespace Patterns\Componente;

use \Patterns\Interfaces\ComponenteInterface;

class TextArea implements ComponenteInterface {

    private $texto;

    public function __construct($texto = "") {
        $this->texto = $texto;
    }

    public function render() {
        return "<textarea>{$this->texto}</textarea>";
    }

    public function setTexto($texto) {
        $this->texto = $texto;
        return $this;
    }

}
