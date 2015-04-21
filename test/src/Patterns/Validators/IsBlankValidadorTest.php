<?php

namespace Patterns\Validators;

class IsBlankValidadorTest extends \PHPUnit_Framework_TestCase{
    function testVerificaSeOValorFornecidoEVazio() {
        $validador = new IsBlankValidador("");
        $this->assertEquals(true, $validador->isValid("teste"));
        $this->assertEquals(false, $validador->isValid(""));
    }
    
    public function testVerificaSeEUmaClassseDoTipoValidador() {
        $this->assertInstanceOf("Patterns\Interfaces\ValidadorInterface", new \Patterns\Validators\IsBlankValidador(""));        
    }
}
