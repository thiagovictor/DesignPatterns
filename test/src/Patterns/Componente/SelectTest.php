<?php

namespace Patterns\Componente;

class SelectTest extends \PHPUnit_Framework_TestCase{
    
    public function testVerificaFuncionamentoSetNomeEGetNome() {
        $componente = new Select();
        $componente->setName("nome");
        $this->assertEquals("nome", $componente->getName());
    }
   
    public function testVerificaFuncionamentoSetOptionEGetValue() {
        $componente = new Select();
        $componente->setOption(1,"Batata Doce");
        $componente->setOption(2,"Maria mole");
        $this->assertEquals("Batata Doce", $componente->getValue()[1]);
        $this->assertEquals("Maria mole", $componente->getValue()[2]);
    }
    
    public function testVerificaFuncionamentoSetDefaultEGetDefault() {
        $componente = new Select();
        $componente->setOption(1,"Batata Doce");
        $componente->setOption(2,"Maria mole");
        $componente->setDefault(2);
        $this->assertEquals("Maria mole", $componente->getDefaut()[2]);
      
    }
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new Select());        
    }
}

