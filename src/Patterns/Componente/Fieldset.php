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
        if($this->componentesVazio()){
            echo "<fieldset>";
            if (!$this->legenda == NULL) {
                echo "<legend>{$this->legenda}</legend>";
            }
            foreach ($this->componentes as $componente) {
                echo $componente->render();
            }
            echo "</fieldset>";
        }
    }
    
    private function componentesVazio() {
        if(null == $this->componentes or sizeof($this->componentes) < 1){
            return false;
        }
        return true;
    }

    public function setLegenda($legenda) {
        $this->legenda = $legenda;
        return $this;
    }

    public function setField(ComponenteInterface $componente) {
        $this->componentes[] = $componente;
    }

}
