<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class LimitCaracterValidador implements ValidadorInterface {
    private $for;
    private $limit;
    
    public function __construct($for, $limit) {
        $this->for = $for;
        $this->limit = $limit;
    }
    public function isValid($data){
        if(strlen($data) > $this->limit ){
            return "Este campo excedeu o Limite permitido: max. {$this->limit} caracteres.";
        }
        return "";
    }
    public function getFor(){
        return $this->for;
    }
}
