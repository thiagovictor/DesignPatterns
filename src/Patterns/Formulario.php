<?php

namespace Patterns;

use Patterns\Factory\FieldFactory;

class Formulario {

    private $componentes;
    private $name;
    private $method;
    private $action;
    private $id;
    private $enctype;
    private $validadores;
    private $factory;
    private $fieldset;

    public function __construct(FieldFactory $factory, $name = "", $method = "", $action = "", $id = NULL, $enctype = NULL) {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
        $this->id = $id;
        $this->enctype = $enctype;
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

    public function getName() {
        return $this->name;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getAction() {
        return $this->action;
    }

    public function getId() {
        return $this->id;
    }

    public function getEnctype() {
        return $this->enctype;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEnctype($enctype) {
        $this->enctype = $enctype;
    }

    public function reset() {
        $this->name = "";
        $this->method = "";
        $this->action = "";
        $this->id = NULL;
        $this->enctype = NULL;
        return $this;
    }

    public function setValidador(Interfaces\ValidadorInterface $validador) {
        $this->validadores[] = $validador;
        return $this;
    }

    public function getValidador($for) {
        if (!is_null($this->validadores)) {
            foreach ($this->validadores as $validador) {
                if ($validador->getFor() === $for) {
                    return $validador;
                }
            }
        }
        return new Validators\ObjectNullValidador("");
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

    private function verificarMensagemValidacao($name, $value) {
        if ($this->getValidador($name)->isValid($value)) {
            return "";
        }
        return $this->getValidador($name)->getMessageError();
    }

    private function setComponenteValueByName($name, $value) {
        $mensagem = $this->verificarMensagemValidacao($name, $value);
        foreach ($this->componentes as $componente) {

            if ($componente instanceof Componente\Fieldset) {
                if ($componente->setComponenteValueByName($name, $value, $mensagem)) {
                    return true;
                }
            }

            if (!$componente instanceof Interfaces\ComponentePopulate) {
                continue;
            }

            if ($name === $componente->getName()) {
                $componente->setValue($value);
                $componente->setErro($mensagem);
                return true;
            }
        }
        return false;
    }

    public function getComponenteByName($name) {

        foreach ($this->componentes as $componente) {
            if ($componente instanceof Componente\Fieldset) {
                return $componente->getComponenteByName($name);
            }
            if (!$componente instanceof ComponentePopulate) {
                continue;
            }
            if ($name === $componente->getName()) {
                return $componente;
            }
        }
        return false;
    }

    public function popular($data) {
        foreach ($data as $key => $value) {
            $this->setComponenteValueByName($key, $value);
        }
    }

}
