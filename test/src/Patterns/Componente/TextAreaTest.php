<?php


namespace Patterns\Componente;

class TextAreaTest extends \PHPUnit_Framework_TestCase  {
    public function testVerificaFuncionamentoSetNomeEGetNome() {
        $componente = new TextArea();
        $componente->setName("Descricao");
        $this->assertEquals("Descricao", $componente->getName());
    }
    public function testVerificaFuncionamentoSetTextoEGetTexto() {
        $componente = new TextArea();
        $componente->setTexto("Esta e um texto");
        $this->assertEquals("Esta e um texto", $componente->getTexto());
    }

    public function testVerificaFuncionamentoSetValueEGetValue() {
        $componente = new TextArea();
        $componente->setValue("Esta e um texto");
        $this->assertEquals("Esta e um texto", $componente->getValue());
    }
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new TextArea());        
    }
}
