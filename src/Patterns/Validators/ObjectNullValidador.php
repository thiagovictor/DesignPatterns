<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class ObjectNullValidador implements ValidadorInterface {
    private $for;
    
    public function __construct($for) {
        $this->for = $for;
    }
    public function isValid($data){
        return true;
    }
    public function getFor(){
        return $this->for;
    }
    
    public function getMessageError() {
        return "";
    }

}
