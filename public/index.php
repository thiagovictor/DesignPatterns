<?php
chdir(dirname(__DIR__));
require 'autoloader.php';

use Patterns\Formulario;
use Patterns\Componente\Input,
    Patterns\Componente\Label,
    Patterns\Componente\Text,
    Patterns\Componente\Fieldset;
use Patterns\Validators;

$form = new Formulario(new Validators\Validator(new Patterns\Request()), "form1", "POST", "#");
$fieldset = new Fieldset("fieldset1");
$fieldset->addMembros(new Label("nome", "Nome :"))
        ->addMembros(new Input("nome", "text", "nome"))
        ->addMembros(new Text("<br>"))
        ->addMembros(new Label("email", "Email :"))
        ->addMembros(new Input("email", "email", "email"))
        ->addMembros(new Text("<br>"))
        ->addMembros(new Label("sexo", "Sexo :"))
        ->addMembros(new Input("sexo", "radio", "sexo", "M"))
        ->addMembros(new Text("Masculino"))
        ->addMembros(new Input("sexo", "radio", "sexo", "F"))
        ->addMembros(new Text("Feminino"))
        ->addMembros(new Text("<br>"))
        ->addMembros(new Input("enviar", "submit", NULL, "Enviar"));
$form->createField($fieldset);
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