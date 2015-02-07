<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Fieldset implements ComponenteInterface {

    private $legenda;
    private $tag;

    public function __construct($tag = "", $legenda = NULL) {
        $this->legenda = $legenda;
        $this->tag = $tag;
    }

    public function render() {
        switch ($this->tag){
        case "open": 
            echo "<fieldset>";
            if(!$this->legenda == NULL){
                echo "<legend>{$this->legenda}</legend>";
            }
            break;
        case "close" :
            echo "</fieldset>";
            break;
        default :
            
        } 
    }
    
    public function setLegenda($legenda) {
        $this->legenda = $legenda;
        return $this;
    }

    public function setTag($tag) {
        $this->tag = $tag;
        return $this;
    }


    

}