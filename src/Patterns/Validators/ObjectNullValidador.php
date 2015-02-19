<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class ObjectNullValidador implements ValidadorInterface {
    private $for;
    
    public function __construct($for) {
        $this->for = $for;
    }
    public function isValid($data){
        $data = "";
        return "";
    }
    public function getFor(){
        return $this->for;
    }
}
