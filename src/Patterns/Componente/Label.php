<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Label implements ComponenteInterface {

    private $for;
    private $label;

    public function __construct($for = "", $label = "") {
        $this->for = $for;
        $this->label = $label;
    }

    public function render() {
        return "<label for='{$this->for}'>{$this->label}</label>";
    }

    public function setFor($for) {
        $this->for = $for;
        return $this;
    }

    public function setLabel($label) {
        $this->label = $label;
        return $this;
    }

}
