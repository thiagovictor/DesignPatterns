<?php

namespace Patterns\Validators;

class NumericValidadorTest  extends \PHPUnit_Framework_TestCase{
    
    public function providerNumber() {
        return [
            [10.2,true],
            ['10,2', false],
            ['string', false],
            ['10.2', true],
            [10, true]
            
        ];
    }
    /**
     * @dataProvider providerNumber
     */
    public function testVerificarSeORetornoENumerico($valor, $resultado) {
        $validador = new NumericValidador("");
        $this->assertEquals($resultado, $validador->isValid($valor));
    }
}
