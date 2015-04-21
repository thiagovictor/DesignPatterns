<?php

namespace Patterns\Validators;

use Patterns\Interfaces\ValidadorInterface;

class IsBlankValidador implements ValidadorInterface {
    private $for;
    private $menssage;
    
    public function __construct($for) {
        $this->for = $for;
    }
    public function isValid($data){
        if($data === "" or $data === null){
            $this->menssage = "Este campo não pode estar vazio";
            return false;
        }
        $this->menssage = "";
        return true;
    }
    
    public function getMessageError() {
        return $this->menssage;
    }
    public function getFor(){
        return $this->for;
    }
}
