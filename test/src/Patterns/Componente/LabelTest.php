<?php


namespace Patterns\Componente;

class LabelTest extends \PHPUnit_Framework_TestCase{
    public function testVerificaFuncionamentoSetForEGetFor() {
        $componente = new Label();
        $componente->setFor("nome");
        $this->assertEquals("nome", $componente->getFor());
    }
    public function testVerificaFuncionamentoSetLabelEGetLabel() {
        $componente = new Label();
        $componente->setLabel("Nome");
        $this->assertEquals("Nome", $componente->getLabel());
    }
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new Label());        
    }
}
