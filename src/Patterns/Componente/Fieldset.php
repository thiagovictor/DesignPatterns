<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Fieldset implements ComponenteInterface {

    private $componentes;
    private $name;
    private $status;

    public function __construct($name, $status = "") {
        $this->name = $name;
        $this->status = $status;
    }

    public function addMembros(ComponenteInterface $componente) {
        $this->componentes[] = $componente;
        return $this;
    }

    public function render() {
        echo "<fieldset name='{$this->name}' {$this->status}>";
        foreach ($this->componentes as $componente) {
            echo $componente->render();
        }
        echo "</fieldset>";
    }

}
