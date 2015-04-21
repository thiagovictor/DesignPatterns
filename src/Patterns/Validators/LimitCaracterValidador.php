<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class LimitCaracterValidador implements ValidadorInterface {
    private $for;
    private $limit;
    private $message;
    
    public function __construct($for, $limit) {
        $this->for = $for;
        $this->limit = $limit;
    }
    public function isValid($data){
        if(strlen($data) > $this->limit ){
            $this->message = "Este campo excedeu o Limite permitido: max. {$this->limit} caracteres.";
            return false;
        }
       $this->message = "";
       return true;
    }
    public function getFor(){
        return $this->for;
    }

    public function getMessageError() {
        return $this->message;
    }

}
