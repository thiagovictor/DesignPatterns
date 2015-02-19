<?php

namespace Patterns\Factory;

use \Patterns\Interfaces\ComponenteInterface;

class FieldFactory {

    private $field;
    private $fieldsValid = array(
        "label" => "Patterns\Componente\Label",
        "text" => "Patterns\Componente\Text",
        "input" => "Patterns\Componente\Input",
        "fieldset" => "Patterns\Componente\Fieldset",
        "quebra" => "Patterns\Componente\Quebra",
        "textArea" => "Patterns\Componente\TextArea",
        "Select" => "Patterns\Componente\Select"
    );

    public function createField($tipo, array $parametros = array()) {

        if (!array_key_exists($tipo, $this->fieldsValid)) {
            return false;
        }

        $field = new $this->fieldsValid[$tipo];

        if (!$field instanceof ComponenteInterface) {
            return false;
        }

        foreach ($parametros as $metodo => $valor) {
            //exemplo: setNome
            $metodo = 'set' . ucfirst($metodo);
            if (!method_exists($field, $metodo)) {
                return false;
            }
            $field->$metodo($valor);
        }

        $this->field = $field;

        return true;
    }

    public function getField() {
        return $this->field;
    }

}
