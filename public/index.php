<?php

chdir(dirname(__DIR__));
require 'autoloader.php';


use Patterns\Formulario;
use Patterns\Componente\Input,
    Patterns\Componente\Label,
    Patterns\Componente\Text;
use Patterns\Validators;

$form = new Formulario(new Validators\Validator(new Patterns\Request()), "form1","POST","#");
$form->createField(new Label("nome", "Nome :")) 
    ->createField(new Input("nome", "text", "nome"))
    ->createField(new Text("<br>"))
    ->createField(new Label("email", "Email :"))
    ->createField(new Input("email", "email", "email"))
    ->createField(new Text("<br>"))
    ->createField(new Label("sexo", "Sexo :"))
    ->createField(new Input("sexo", "radio", "sexo", "M"))
    ->createField(new Text("Masculino"))
    ->createField(new Input("sexo", "radio", "sexo", "F"))
    ->createField(new Text("Feminino"))
    ->createField(new Text("<br>"))
    ->createField(new Input("enviar", "submit", NULL, "Enviar"));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Formulário Dinâmico</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Formulário Dinâmico</h1>
        <div><?php $form->render();?></div>
    </body>
</html>