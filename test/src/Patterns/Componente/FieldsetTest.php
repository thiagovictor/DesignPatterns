<?php

namespace Patterns\Componente;


class FieldsetTest extends \PHPUnit_Framework_TestCase{
   
    public function testVerificaSeEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface", new \Patterns\Componente\Fieldset());        
    }
}
