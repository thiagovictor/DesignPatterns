<?php


namespace Patterns;

class FormularioTest extends \PHPUnit_Framework_TestCase {
    public function testVerificaFuncionamentoSetNomeEGetNome() {
        $componente = new Formulario($this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField')));
        $componente->setName("Form1");
        $this->assertEquals("Form1", $componente->getName());
    }
    public function testVerificaFuncionamentoSetActionEGetAction() {
        $componente = new Formulario($this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField')));
        $componente->setAction("");
        $this->assertEquals("", $componente->getAction());
    }
    public function testVerificaFuncionamentoSetEnctypeEGetEnctype() {
        $componente = new Formulario($this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField')));
        $componente->setEnctype("multipart/form-data");
        $this->assertEquals("multipart/form-data", $componente->getEnctype());
    }
    public function testVerificaFuncionamentoSetIdEGetId() {
        $componente = new Formulario($this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField')));
        $componente->setId("form1");
        $this->assertEquals("form1", $componente->getId());
    }
    public function testVerificaFuncionamentoSetMethodEGetMethod() {
        $componente = new Formulario($this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField')));
        $componente->setMethod("POST");
        $this->assertEquals("POST", $componente->getMethod());
    }
    
    public function testVerificaCriacaoDeField() {
        $componente_label = $this->getMock("\Patterns\Componente\Label", array("getFor"));
        $componente_label->expects($this->any())
                         ->method("getFor")
                         ->willReturn("nome");

        $factory = $this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField'));
        $factory->expects($this->any())
                ->method("createField")
                ->willReturn($componente_label);
        $factory->expects($this->any())
                ->method("getField")
                ->willReturn($componente_label);
        
        $formulario = new Formulario($factory);
        $componente = $formulario->createField("label", array("label" => "Nome :", "for" => "nome"));
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",$componente);
        $this->assertEquals("nome", $componente->getFor());
        
    }
    
    public function testVerificaGetFieldsetActivated() {
        $componente_fieldset = $this->getMock("\Patterns\Componente\Fieldset", array("getLegenda"));
        $componente_fieldset->expects($this->any())
                         ->method("getLegenda")
                         ->willReturn("Cadastro de Produtos");

        $factory = $this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField'));
        $factory->expects($this->any())
                ->method("createField")
                ->willReturn($componente_fieldset);
        $factory->expects($this->any())
                ->method("getField")
                ->willReturn($componente_fieldset);
        
        $formulario = new Formulario($factory);
        $componente = $formulario->createField("label", array("label" => "Nome :", "for" => "nome"));
        $this->assertInstanceOf("\Patterns\Componente\Fieldset",$componente);
        $this->assertEquals("Cadastro de Produtos", $componente->getLegenda());    
    }
    
    public function testVerificaSetValidadorEGetValidador() {
        $validador = $this->getMock("\Patterns\Validators\NumericValidador", array("getFor"), array('input_nome'));
        $validador->expects($this->any())
                         ->method("getFor")
                         ->willReturn('input_nome');
        $factory = $this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField'));
        $formulario = new Formulario($factory);
        $componente = $formulario->setValidador($validador)->getValidador("input_nome");
        $this->assertInstanceOf("\Patterns\Interfaces\ValidadorInterface",$componente);
        $this->assertEquals("input_nome", $componente->getFor());
    }
    
    public function testVerificaPopularSetComponenteValueByNameEGetComponenteByName() {
        $name = "nome";
        $input = $this->getMock("\Patterns\Componente\Input", array("getValue","setValue","getName","setErro"));
        $input->expects($this->any())
                         ->method("getValue")
                         ->willReturn('Teste de nome');
        $input->expects($this->any())
                         ->method("getName")
                         ->willReturn($name);
        $factory = $this->getMock('\Patterns\Factory\FieldFactory', array('createField','getField'));
        $factory->expects($this->any())
                ->method("createField")
                ->willReturn($input);
        $factory->expects($this->any())
                ->method("getField")
                ->willReturn($input);
        $formulario = new Formulario($factory);
        $formulario->createField("input", array("name" => $name, "type" => "text", "id" => "idnome"));
        $data = [
            ["nome"=>"Teste de nome"]
        ];
        $formulario->popular($data);
        $componente = $formulario->getComponenteByName($name);
        
        $this->assertInstanceOf("\Patterns\Componente\Input",$componente);
        $this->assertEquals("Teste de nome", $componente->getValue());
    }
}
