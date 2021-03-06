<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface,
    Patterns\Interfaces\ComponentePopulate;

class Input implements ComponenteInterface, ComponentePopulate {

    private $nome;
    private $id;
    private $type;
    private $value;
    private $mensagem;

    public function __construct($nome = "", $type = "", $id = NULL, $value = "") {
        $this->nome = $nome;
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
    }

    public function render() {
        $id = "";
        if (NULL != $this->id) {
            $id = "id='{$this->id}'";
        }
        if ($this->mensagem) {
            $this->mensagem = "<ul><li>{$this->mensagem}</li></ul>";
        }
        return "<input type='{$this->type}' name='{$this->nome}' {$id} value='{$this->value}' >{$this->mensagem}";
    }

    public function getName() {
        return $this->nome;
    }

    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getValue() {
        return $this->value;
    }

    public function setName($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    public function setErro($mensagem) {
        $this->mensagem = $mensagem;
    }

}
