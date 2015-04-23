<?php

namespace Patterns\Componente;

class TextTest extends \PHPUnit_Framework_TestCase {
    public function testVerificaFuncionamentoSetTextEGetText() {
        $componente = new Text();
        $componente->setText("Novo texto de teste");
        $this->assertEquals("Novo texto de teste", $componente->getText());
    }

    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new Text());        
    }
}
