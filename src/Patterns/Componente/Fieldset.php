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
            $render = "<fieldset>";
            if (!$this->legenda == NULL) {
                $render .= "<legend>{$this->legenda}</legend>";
            }
            foreach ($this->componentes as $componente) {
                $render .= $componente->render();
            }
            return $render .= "</fieldset>";
        }
        return "";
    }

    public function componentesVazio() {
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
        return $componente;
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

    public function getComponenteByName($name) {
        foreach ($this->componentes as $componente) {
            if ($componente instanceof Fieldset) {
                return $componente->getComponenteByName($name);
            }
            if (!$componente instanceof ComponentePopulate) {
                continue;
            }
            if ($name === $componente->getName()) {
                return $componente;
            }
        }
        return false;
    }

    public function getLegenda() {
        return $this->legenda;
    }

}
