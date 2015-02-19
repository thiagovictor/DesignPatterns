<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class IsBlankValidador implements ValidadorInterface {
    private $for;
    
    public function __construct($for) {
        $this->for = $for;
    }
    public function isValid($data){
        if($data === "" or $data === null){
            return "Este campo não pode estar vazio";
        }
        return "";
    }
    public function getFor(){
        return $this->for;
    }
}
