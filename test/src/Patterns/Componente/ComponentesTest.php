<?php

namespace Patterns\Componente;


class ComponentesTest extends \PHPUnit_Framework_TestCase{
    public function ProviderComponentes() {
        return [
            [new \Patterns\Componente\Fieldset()],
            [new \Patterns\Componente\Input()],
            [new \Patterns\Componente\Label()],
            [new \Patterns\Componente\Quebra()],
            [new \Patterns\Componente\Select()],
            [new \Patterns\Componente\Text()],
            [new \Patterns\Componente\TextArea()]
        ];
    }
    /**
     * @dataProvider ProviderComponentes
     */
    
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface($componente) {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",$componente);        
    }
}
