<?php


namespace Patterns;

use Patterns\Formulario;
use Patterns\Factory\FieldFactory;
use Patterns\Validators\NumericValidador,
    Patterns\Validators\IsBlankValidador,
    Patterns\Validators\LimitCaracterValidador;
use Patterns\Conexao\Conexao;
use SQLite3;

class FormularioTest extends \PHPUnit_Framework_TestCase {
    private $factory;
    private $form;
    private $conexao;

    
    public function setUp() {
        $this->conexao = new Conexao(new SQLite3("empresa.db"));
        $this->factory = new FieldFactory();
        $this->form = new Formulario($this->factory);
        
        $this->form->setName("Form")
            ->setMethod("POST")
            ->setValidador(new NumericValidador("valor"))
            ->setValidador(new IsBlankValidador("nome"))
            ->setValidador(new LimitCaracterValidador("descricao", 200));
        $this->form->createField("label", array("label" => "Componente fora do field :", "for" => "fora"));
        $this->form->createField("input", array("name" => "fora", "type" => "text", "id" => "idfora"));
        $this->form->createField("fieldset", array("Legenda" => "Cadastro de Produtos"));
        $this->form->createField("label", array("label" => "Nome :", "for" => "nome"));
        $this->form->createField("input", array("name" => "nome", "type" => "text", "id" => "idnome"));
        $this->form->createField("quebra");
        $this->form->createField("label", array("label" => "Valor :", "for" => "valor"));
        $this->form->createField("input", array("name" => "valor", "type" => "text", "id" => "idvalor"));
        $this->form->createField("quebra");
        $this->form->createField("label", array("label" => "Cartegoria :", "for" => "cartegoria"));
        $this->form->createField("Select", array("name"=>"cartegoria", "options"=>$this->conexao->getCategorias()));
        $this->form->createField("quebra");
        $this->form->createField("fieldset", array("Legenda" => "Descricao"));
        $this->form->createField("textArea", array("name"=>"descricao"));
        $this->form->createField("quebra");
        $this->form->fieldSetClose();
        $this->form->fieldSetClose();
        $this->form->createField("input", array("name" => "Autenticar", "type" => "submit", "value" => "Cadastrar"));
    }
    
    public function tearDown() {
        $this->conexao = NULL;
        $this->factory = NULL;
        $this->form = NULL;
  
    }
    
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
        $data = array("descricao"=>"Teste de nome");
        $this->form->popular($data);
        $componente = $this->form->getComponenteByName("descricao");
        $this->assertInstanceOf("\Patterns\Componente\TextArea",$componente);
        $this->assertEquals("Teste de nome", $componente->getValue());
    }
    
    public function testFailGetByName() {
        $this->assertFalse($this->form->getComponenteByName("Componente_nao_existe"));
    }
    
    public function testResetDeAtributos() {
        $this->form->reset();
        $this->assertEmpty($this->form->getMethod());
    }
}
