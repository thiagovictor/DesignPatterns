<?php

namespace Patterns\Factory;

class FieldFactoryTest extends \PHPUnit_Framework_TestCase{
    public function testVerificaCriacaoDeComponenteField() {
        $componente = new FieldFactory();
        $componente->createField("label", array("label" => "Nome :", "for" => "nome"));
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",$componente->getField());
        $this->assertEquals("nome", $componente->getField()->getFor());
    }
    
    public function testFailCriacaoDeComponenteField() {
        $this->assertFalse((new FieldFactory())->createField("Componente_inexistente", array("label" => "Nome :", "for" => "nome")));
    }
    
    public function testFailImplementsComponenteInterfaceCriacaoDeComponenteField() {
        $this->assertFalse((new FieldFactory())->createField("invalido", array("label" => "Nome :", "Metodo_inexistente" => "nome")));
    }
    
        public function testFailParametrosCriacaoDeComponenteField() {
        $this->assertFalse((new FieldFactory())->createField("label", array("method_errado" => "Nome :", "for" => "nome")));
    }
}
