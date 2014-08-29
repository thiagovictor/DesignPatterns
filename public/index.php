<?php

chdir(dirname(__DIR__));
require 'autoloader.php';

use Patterns\Formulario\Formulario;
use Patterns\Componente\Input,
    Patterns\Componente\Label,
    Patterns\Componente\Text;

$form = new Formulario("form1","POST");
$nome = new Input("nome", "text", "nome", "");
$labelNome = new Label("nome", "Nome :");
$email = new Input("email", "email", "email", "");
$labelEmail = new Label("email", "Email :");
$sexo= new Input("sexo", "radio", "sexo", "M");
$labelSexo = new Label("sexo", "Sexo :");
$sexo1= new Input("sexo", "radio", "sexo", "F");
$submit= new Input("enviar", "submit", NULL, "Enviar");
$linha = new Text("<br>");
$text1 = new Text("Masculino");
$text2 = new Text("Feminino");


$form->addComponentes($labelNome) 
    ->addComponentes($nome)
    ->addComponentes($linha)
    ->addComponentes($labelEmail)
    ->addComponentes($email)
    ->addComponentes($linha)
    ->addComponentes($labelSexo)
    ->addComponentes($sexo)
    ->addComponentes($text1)
    ->addComponentes($sexo1)
    ->addComponentes($text2)
    ->addComponentes($linha)
    ->addComponentes($submit);
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