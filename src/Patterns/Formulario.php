<?php


namespace Patterns;

use Patterns\Factory\FieldFactory;
use Patterns\Validators\Validator;

class Formulario {
    
    private $componentes;
    private $name;
    private $method;
    private $action;
    private $id;
    private $enctype;
    private $validador;
    private $factory;
    
    public function __construct(Validator $validador,  FieldFactory $factory,  $name = "", $method = "", $action= "", $id = NULL, $enctype = NULL) {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
        $this->id = $id;
        $this->enctype = $enctype;
        $this->validador = $validador;
        $this->factory = $factory;
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
        return "<form name='{$this->name}' {$id} method='{$this->method}' action='{$this->action}' {$enctype} >";  
    }
    
    public function createField($tipo , array $parametros = array()) {
        if($this->factory->createField($tipo, $parametros)){
            $this->componentes[] = $this->factory->getField();
        }
        return $this;
    }
    
    private function footer() {
        return "</form>";
    }
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setMethod($method) {
        $this->method = $method;
        return $this;
    }

    public function setAction($action) {
        $this->action = $action;
        return $this;
    }
    
    public function reset() {
        $this->name = "";
        $this->method = "";
        $this->action = "";
        $this->id = NULL;
        $this->enctype = NULL;
        return $this;
    }


}
