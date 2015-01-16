<?php
chdir(dirname(__DIR__));
require 'autoloader.php';

use Patterns\Formulario;
use Patterns\Validators;
use Patterns\Factory\FieldFactory;

$form = new Formulario(new Validators\Validator(new Patterns\Request()), new FieldFactory,  "form1", "POST", "#");
$form->createField("label", array("label"=>"Nome :","for"=>"nome"))
     ->createField("input", array("nome"=>"nome","type"=>"text","id"=>"idnome"))
     ->createField("quebra")
     ->createField("label", array("label"=>"Sexo :","for"=>"sexo"))
     ->createField("input", array("nome"=>"sexo","type"=>"radio","id"=>"idsexo","value"=>"M"))
     ->createField("text", array("text"=>"Masculino")) 
     ->createField("input", array("nome"=>"sexo","type"=>"radio","id"=>"idsexo","value"=>"F"))
     ->createField("text", array("text"=>"Feminino"))
     ->createField("quebra")
     ->createField("label", array("label"=>"Texto :","for"=>"texto"))
     ->createField("textArea")
     ->createField("quebra")
     ->createField("input", array("nome"=>"enviar","type"=>"submit","value"=>"Enviar"));
     
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Design Patterns</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Formulário Fase II</h1>
        <div><?php $form->render(); ?></div>
    </body>
</html>