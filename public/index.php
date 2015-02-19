<?php
chdir(dirname(__DIR__));
require 'autoloader.php';

use Patterns\Formulario;
use Patterns\Factory\FieldFactory;
use Patterns\Validators\NumericValidador,
    Patterns\Validators\IsBlankValidador,
    Patterns\Validators\LimitCaracterValidador;
use Patterns\Conexao\Conexao;

$conexao = new Conexao(new SQLite3("empresa.db")); //Contém tabela de cartegorias.
$form = new Formulario(new FieldFactory);

$form->setName("Form")
        ->setMethod("POST")
        ->setValidador(new NumericValidador("valor"))
        ->setValidador(new IsBlankValidador("nome"))
        ->setValidador(new LimitCaracterValidador("descricao", 200));
$form->createField("fieldset", array("Legenda" => "Cadastro de Produtos"));
$form->createField("label", array("label" => "Nome :", "for" => "nome"));
$form->createField("input", array("name" => "nome", "type" => "text", "id" => "idnome"));
$form->createField("quebra");
$form->createField("label", array("label" => "Valor :", "for" => "valor"));
$form->createField("input", array("name" => "valor", "type" => "text", "id" => "idvalor"));
$form->createField("quebra");
$form->createField("label", array("label" => "Cartegoria :", "for" => "cartegoria"));
$form->createField("Select", array("name"=>"cartegoria", "options"=>$conexao->getCategorias()));
$form->createField("quebra");
$form->createField("fieldset", array("Legenda" => "Descricao"));
$form->createField("textArea", array("name"=>"descricao"));
$form->createField("quebra");
$form->fieldSetClose();
$form->fieldSetClose();
$form->createField("input", array("name" => "Autenticar", "type" => "submit", "value" => "Cadastrar"));


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Design Patterns</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Formulário Fase IV</h1>
        <div><?php
            if(!empty($_POST)){
                $form->popular($_POST);
                $form->render();
            }else {
                $form->render();
            }
            
            ?></div>

    </body>
</html>