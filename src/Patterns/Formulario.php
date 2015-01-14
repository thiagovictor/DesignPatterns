<?php


namespace Patterns;

use Patterns\Interfaces\ComponenteInterface;
use Patterns\Validators;
use Patterns;

class Formulario {
    
    private $componentes;
    private $name;
    private $method;
    private $action;
    private $id;
    private $enctype;
    private $validador;
    
    public function __construct(Validators\Validator $validador, $name, $method, $action, $id = NULL, $enctype = NULL) {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
        $this->id = $id;
        $this->enctype = $enctype;
        $this->validador = $validador;
    }
    
    public function render() {
        echo $this->head();
        foreach ($this->componentes as $componente) {
            echo $componente->render();
        }
        echo $this->footer();
    }
    
    private function head(){
        $id = "";
        $enctype = "";
        
        if(NULL != $this->id){
            $id = "id='{$this->id}'";
        }
      
        if(NULL != $this->enctype){
            $enctype = "enctype='{$this->enctype}'";
        }
        return "<form name='{$this->name}' {$id} method='{$this->method}' action='{$this->action}' {$enctype} ><fieldset>";  
    }
    
    public function createField(ComponenteInterface $componente) {
        $this->componentes[] = $componente;
        return $this;
    }
    
    private function footer() {
        return "</fieldset></form>";
    }
    
}
