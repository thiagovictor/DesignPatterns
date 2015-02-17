<?php
chdir(dirname(__DIR__));
require 'autoloader.php';

use Patterns\Formulario;
use Patterns\Validators\Validator;
use Patterns\Factory\FieldFactory;
use Patterns\Request;

$form = new Formulario(new Validator(new Request()), new FieldFactory);
$form1 = clone $form;
$form2 = clone $form;
$form3 = clone $form;

$form->reset()->setName("Form")
        ->setMethod("POST");
$form->createField("fieldset", array("Legenda" => "Formulario de logon"));
$form->createField("label", array("label" => "Email :", "for" => "email"));
$form->createField("input", array("nome" => "email", "type" => "text", "id" => "idemail"));
$form->createField("quebra");
$form->createField("label", array("label" => "Senha :", "for" => "senha"));
$form->createField("input", array("nome" => "senha", "type" => "password", "id" => "idpassword"));
$form->createField("quebra");
$form->createField("input", array("nome" => "Autenticar", "type" => "submit", "value" => "Entrar"));
$form->createField("fieldset", array("Legenda" => "Motivo do Logon"));
$form->createField("textArea");
$form->fieldSetClose();

$form1->reset()->setName("Form1")
        ->setMethod("POST");
$form1->createField("label", array("label" => "Nome :", "for" => "nome"));
$form1->createField("input", array("nome" => "nome", "type" => "text", "id" => "idnome"));
$form1->createField("quebra");
$form1->createField("label", array("label" => "Sexo :", "for" => "sexo"));
$form1->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "M"));
$form1->createField("text", array("text" => "Masculino"));
$form1->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "F"));
$form1->createField("text", array("text" => "Feminino"));
$form1->createField("quebra");
$form1->createField("label", array("label" => "Texto :", "for" => "texto"));
$form1->createField("textArea");
$form1->createField("quebra");
$form1->createField("input", array("nome" => "enviar", "type" => "submit", "value" => "Enviar"));

$form2->reset()->setName("Form2")
        ->setMethod("POST");
$form2->createField("label", array("label" => "Texto :", "for" => "texto"));
$form2->createField("textArea");
$form2->createField("quebra");
$form2->createField("input", array("nome" => "enviar", "type" => "submit", "value" => "Enviar"));

$form3->reset()->setName("Form3")
        ->setMethod("POST");
$form3->createField("label", array("label" => "Sexo :", "for" => "sexo"));
$form3->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "M"));
$form3->createField("text", array("text" => "Masculino"));
$form3->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "F"));
$form3->createField("text", array("text" => "Feminino"));
$form3->createField("quebra");
$form3->createField("input", array("nome" => "enviar", "type" => "submit", "value" => "Enviar"));
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
        <div><?php
            $form->render();
            $form1->render();
            $form2->render();
            $form3->render();
            ?></div>

    </body>
</html>