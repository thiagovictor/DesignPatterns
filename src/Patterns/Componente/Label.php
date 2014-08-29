<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Label implements ComponenteInterface{
    
    private $for;
    private $nome;
    
    public function __construct($for, $nome) {
        $this->for = $for;
        $this->nome = $nome;
    }
    
    public function gerarHtml() {
        return "<label for='{$this->for}'>{$this->nome}</label>";
    }

}
