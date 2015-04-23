<?php


namespace Patterns\Componente;

class FieldsetTest extends \PHPUnit_Framework_TestCase{
    public function testVerificaFuncionamentoSetValueEGetValue() {
        $componente = new Fieldset();
        $componente->setLegenda("Questionario");
        $this->assertEquals("Questionario", $componente->getLegenda());
    }
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new Fieldset());        
    }
}
