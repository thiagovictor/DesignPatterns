<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class NumericValidador implements ValidadorInterface {
    private $for;
    
    public function __construct($for) {
        $this->for = $for;
    }
    public function isValid($data){
        if(!is_numeric($data)){
            return "Este não é um valor numérico";
        }
        return "";
    }
    public function getFor(){
        return $this->for;
    }
}
