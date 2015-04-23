<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface,
    Patterns\Interfaces\ComponentePopulate;
use Patterns\Componente\Fieldset;

class Fieldset implements ComponenteInterface {

    private $legenda;
    private $componentes;

    public function __construct($legenda = NULL) {
        $this->legenda = $legenda;
    }

    public function render() {
        if ($this->componentesVazio()) {
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
        if (null == $this->componentes or sizeof($this->componentes) < 1) {
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
        //return $componente;
    }

    public function setComponenteValueByName($name, $value, $mensagem) {
        foreach ($this->componentes as $componente) {
            if ($componente instanceof Fieldset) {
                if ($componente->setComponenteValueByName($name, $value, $mensagem)) {
                    return true;
                }
            }
            if (!$componente instanceof ComponentePopulate) {
                continue;
            }     
            if ($name === $componente->getName()) {
                $componente->setValue($value);
                $componente->setErro($mensagem);
                return true;
            }
        }
        return false;
    }
    
    public function getLegenda() {
        return $this->legenda;
    }


}
