<?php

namespace Patterns\Componente;

class InputTest extends \PHPUnit_Framework_TestCase{
    
    public function testVerificaFuncionamentoSetNomeEGetNome() {
        $componente = new Input();
        $componente->setName("nome");
        $this->assertEquals("nome", $componente->getName());
    }
    public function testVerificaFuncionamentoSetIdEGetId() {
        $componente = new Input();
        $componente->setId("nome_id");
        $this->assertEquals("nome_id", $componente->getId());
    }
    public function testVerificaFuncionamentoSetTypeEGetType() {
        $componente = new Input();
        $componente->setType("text");
        $this->assertEquals("text", $componente->getType());
    }
     public function testVerificaFuncionamentoSetValueEGetValue() {
        $componente = new Input();
        $componente->setValue("Thiago Santos");
        $this->assertEquals("Thiago Santos", $componente->getValue());
    }
}
