<?php


namespace Patterns\Formulario;

use Patterns\Interfaces\ComponenteInterface;

class Formulario {
    
    private $componentes;
    private $name;
    private $method;
    private $action;
    private $id;
    private $enctype;
    
    public function __construct($name, $method = NULL, $action = NULL, $id = NULL, $enctype = NULL) {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
        $this->id = $id;
        $this->enctype = $enctype;
    }
    
    public function render() {
        echo $this->head();
        foreach ($this->componentes as $componente) {
            echo $componente->gerarHtml();
        }
        echo $this->footer();
    }
    
    private function head(){
        $id = "";
        $action = "";
        $method = "";
        $enctype = "";
        if(NULL != $this->id){
            $id = "id='{$this->id}'";
        }
        if(NULL != $this->action){
            $action = "action='{$this->action}'";
        }
        if(NULL != $this->method){
            $method = "method='{$this->method}'";
        }
        if(NULL != $this->enctype){
            $enctype = "enctype='{$this->enctype}'";
        }
        return "<form name='{$this->name}' {$id} {$method} {$action} {$enctype} ><fieldset>";  
    }
    
    public function addComponentes(ComponenteInterface $componente) {
        $this->componentes[] = $componente;
        return $this;
    }
    
    private function footer() {
        return "</fieldset></form>";
    }
    
}
