<?php

namespace Patterns\Validators;

class LimitCaracterValidadorTest extends \PHPUnit_Framework_TestCase {
    public function testVerificaSeORetornoDoLimitadorEstaCorreto() {
        $validador = new LimitCaracterValidador("", 5);
        $this->assertEquals(true, $validador->isValid("teste"));
        $this->assertEquals(false, $validador->isValid("teste de caracteres"));
        $this->assertEquals(true, $validador->isValid(""));
    }
}
