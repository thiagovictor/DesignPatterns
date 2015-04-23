<?php


namespace Patterns;

class FormularioTest extends \PHPUnit_Framework_TestCase {
    public function testVerificaFuncionamentoSetNomeEGetNome() {
        $componente = new Formulario(new Factory\FieldFactory());
        $componente->setName("Form1");
        $this->assertEquals("Form1", $componente->getName());
    }
    public function testVerificaFuncionamentoSetActionEGetAction() {
        $componente = new Formulario(new Factory\FieldFactory());
        $componente->setAction("");
        $this->assertEquals("", $componente->getAction());
    }
    public function testVerificaFuncionamentoSetEnctypeEGetEnctype() {
        $componente = new Formulario(new Factory\FieldFactory());
        $componente->setEnctype("multipart/form-data");
        $this->assertEquals("multipart/form-data", $componente->getEnctype());
    }
    public function testVerificaFuncionamentoSetIdEGetId() {
        $componente = new Formulario(new Factory\FieldFactory());
        $componente->setId("form1");
        $this->assertEquals("form1", $componente->getId());
    }
    public function testVerificaFuncionamentoSetMethodEGetMethod() {
        $componente = new Formulario(new Factory\FieldFactory());
        $componente->setMethod("POST");
        $this->assertEquals("POST", $componente->getMethod());
    }
    
    public function testVerificaCriacaoDeField() {
        $formulario = new Formulario(new Factory\FieldFactory());
        $formulario->createField("fieldset", array("Legenda" => "Cadastro de Produtos"));
        $componente = $formulario->createField("label", array("label" => "Nome :", "for" => "nome"));
        $this->assertInstanceOf("Patterns\Interfaces\ComponenteInterface",$componente);
        $valor = "";
        if(method_exists($componente, "getFor")){
            $valor = $componente->getFor();
        }
        $this->assertEquals("nome", $valor);
        
    }
}
