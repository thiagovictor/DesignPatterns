<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface,
    Patterns\Interfaces\ComponentePopulate;

class TextArea implements ComponenteInterface, ComponentePopulate {

    private $texto;
    private $name;
    private $mensagem;

    public function __construct($texto = "") {
        $this->texto = $texto;
    }

    public function render() {
        if ($this->mensagem) {
            $this->mensagem = "<ul><li>{$this->mensagem}</li></ul>";
        }
        return "<textarea name='{$this->name}'>{$this->texto}</textarea> {$this->mensagem}";
    }

    public function setTexto($texto) {
        $this->texto = $texto;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->texto;
    }

    public function setValue($value) {
        $this->texto = $value;
    }
    
    public function getTexto() {
        return $this->texto;
    }

        public function setErro($mensagem) {
        $this->mensagem = $mensagem;
    }

}
