<?php

namespace Patterns\Factory;

class FieldFactoryTest extends \PHPUnit_Framework_TestCase{
    public function testVerificaCriacaoDeComponenteField() {
        $componente = new FieldFactory();
        $componente->createField("label", array("label" => "Nome :", "for" => "nome"));
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",$componente->getField());    
    }
}
