<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface,
    Patterns\Interfaces\ComponentePopulate;

class Select implements ComponenteInterface, ComponentePopulate {

    private $name;
    private $options;
    private $mensagem;
    private $defaut;

    public function render() {
        $render = "<select name='{$this->name}'>";
            if(NULL != $this->defaut){
                foreach ($this->defaut as $key => $value) {
                    $render .= "<option value='{$key}'>{$value}</option>";
                }
            }
            if(NULL != $this->options){
                foreach ($this->options as $key => $value) {
                    $render .= "<option value='{$key}'>{$value}</option>";
                }
            }
       return $render .= "</select>";
    }

    public function setName($nome) {
        $this->name = $nome;
    }

    public function setOption($chave, $valor) {
        $this->options[$chave] =  $valor;
    }

    public function setOptions(array $options) {
        foreach ($options as $chave => $valor) {
            $this->setOption($chave, $valor);
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->options;
    }
    
    public function getDefaut() {
        return $this->defaut;
    }
    
    public function setDefault($id) {
        $this->defaut = [$id => $this->options[$id]];
        unset($this->options[$id]);
    }
    
    public function setValue($value) {
        $this->setDefault($value);
    }

    public function setErro($mensagem) {
        $this->mensagem = $mensagem;
    }

}
