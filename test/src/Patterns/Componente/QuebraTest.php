<?php

namespace Patterns\Componente;

class QuebraTest extends \PHPUnit_Framework_TestCase{
    
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new Quebra());        
    }
}

