<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Fieldset implements ComponenteInterface {

    private $legenda;
    private $componentes;

    public function __construct($legenda = NULL) {
        $this->legenda = $legenda;
    }

    public function render() {
        echo "<fieldset>";
        if (!$this->legenda == NULL) {
            echo "<legend>{$this->legenda}</legend>";
        }
        foreach ($this->componentes as $componente) {
            echo $componente->render();
        }
        echo "</fieldset>";
    }

    public function setLegenda($legenda) {
        $this->legenda = $legenda;
        return $this;
    }

    public function setField(ComponenteInterface $componente) {
        $this->componentes[] = $componente;
    }

}
