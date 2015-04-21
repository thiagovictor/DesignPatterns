<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class NumericValidador implements ValidadorInterface {
    private $for;
    private $message;
    
    public function __construct($for) {
        $this->for = $for;
    }
    public function isValid($data){
        if(!is_numeric($data)){
            $this->message = "Este não é um valor numérico";
            return false;
        }
        $this->message =  "";
        return true;
    }
    public function getFor(){
        return $this->for;
    }

    public function getMessageError() {
        return $this->message;
    }

}
