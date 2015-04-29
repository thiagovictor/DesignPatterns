<?php


namespace Patterns\Componente;

class FieldsetTest extends \PHPUnit_Framework_TestCase{
    private $input;
    private $fieldset;
    private $fieldsetPai;
    private $quebra;
    
    public function setUp() {
        $this->input = new Input("nome", "text", "nome_id", "");
        $this->quebra = new Quebra();
        $this->fieldset = new Fieldset("Filho");
        $this->fieldsetPai = new Fieldset("Pai");

        $this->fieldset->setField($this->input);
        $this->fieldsetPai->setField($this->quebra);
        $this->fieldsetPai->setField($this->fieldset);
    }
    
    public function testVerificaRetornoRender() {
        $this->assertEquals("<fieldset><legend>Pai</legend><br><fieldset><legend>Filho</legend><input type='text' name='nome' id='nome_id' value='' ></fieldset></fieldset>", $this->fieldsetPai->render());
        $this->assertEquals("", (new Fieldset())->render());
    }

    public function testVerificaFuncionamentoSetValueEGetValue() {
        $componente = new Fieldset();
        $componente->setLegenda("Questionario");
        $this->assertEquals("Questionario", $componente->getLegenda());
    }
    
    public function testVerificaSeExisteComponentes() {
        $this->assertClassHasAttribute('componentes', 'Patterns\Componente\Fieldset');
        $this->assertClassHasAttribute('legenda', 'Patterns\Componente\Fieldset');
        $this->assertTrue($this->fieldset->componentesVazio());
        $this->assertFalse((new Fieldset("Teste de legenda"))->componentesVazio());
    }
    
    public function testVerificaSeOComponenteEUmaClassseDoTipoComponenteInterface() {
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",new Fieldset());        
    }
    
    public function testVerificaFuncionamentoDoSetFieldEGetComponenteByName() {
        $componente_localizado = $this->fieldset->getComponenteByName("nome");
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface", $componente_localizado);
        $this->assertEquals("nome", $componente_localizado->getName());
        $this->assertFalse($this->fieldset->getComponenteByName("Componente_inexistente"));
    }
    
    public function testVerificaFuncionamentoDoSetComponenteValueByName() {
        $this->fieldsetPai->setComponenteValueByName("nome", "teste de valor", "erro na insercao");
        $componente_localizado = $this->fieldsetPai->getComponenteByName("nome");
        $this->assertEquals("teste de valor", $componente_localizado->getValue());
        $this->assertFalse($this->fieldsetPai->setComponenteValueByName("Componente_inexistente", "teste de valor", ""));
    }
    
    public function tearDown() {
        $this->input = NULL;
        $this->quebra = NULL;
        $this->fieldset = NULL;
        $this->fieldsetPai = NULL;
    } 
}
