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
    private $fieldset;

    public function __construct(Validator $validador, FieldFactory $factory, $name = "", $method = "", $action = "", $id = NULL, $enctype = NULL) {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
        $this->id = $id;
        $this->enctype = $enctype;
        $this->validador = $validador;
        $this->factory = $factory;
        $this->fieldset = null;
    }

    public function render() {
        $this->fieldsetMerge();
        echo $this->head();
        foreach ($this->componentes as $componente) {
            echo $componente->render();
        }
        echo $this->footer();
    }

    private function head() {
        $id = "";
        $enctype = "";

        if (NULL != $this->id) {
            $id = "id='{$this->id}'";
        }

        if (NULL != $this->enctype) {
            $enctype = "enctype='{$this->enctype}'";
        }
        return "<form name='{$this->name}' {$id} method='{$this->method}' action='{$this->action}' {$enctype} >";
    }

    public function createField($tipo, array $parametros = array()) {
        $this->factory->createField($tipo, $parametros);
        return $this->store();
    }

    private function getFieldsetActivated() {
        return end($this->fieldset);
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

    public function store() {
        $field = $this->factory->getField();
        if ($field instanceof Componente\Fieldset) {
            return $this->fieldset[] = $field;
        }
        if (null == $this->fieldset) {
            return $this->componentes[] = $field;
        }
        return $this->getFieldsetActivated()->setField($field);
    }

    private function fieldsetMerge() {
        if (!null == $this->fieldset) {
            $this->componentes[] = $this->fieldset[0];
            $this->fieldset = null;
        }
    }

    public function fieldSetClose() {
        if (sizeof($this->fieldset) > 1) {
            $field = $this->getFieldsetActivated();
            unset($this->fieldset[sizeof($this->fieldset) - 1]);
            return $this->getFieldsetActivated()->setField($field);
        }
        $this->fieldsetMerge();
    }
}
