<?php
chdir(dirname(__DIR__));
require 'autoloader.php';

use Patterns\Formulario;
use Patterns\Validators\Validator;
use Patterns\Factory\FieldFactory;
use Patterns\Request;

$form =  new Formulario(new Validator(new Request()), new FieldFactory);
$form1 = clone $form;
$form2 = clone $form;
$form3 = clone $form;


        $form->reset()->setName("Form")
        ->setMethod("POST")
        ->createField("label", array("label" => "Email :", "for" => "email"))
        ->createField("input", array("nome" => "email", "type" => "text", "id" => "idemail"))
        ->createField("quebra")
        ->createField("label", array("label" => "Senha :", "for" => "senha"))
        ->createField("input", array("nome" => "senha", "type" => "password", "id" => "idpassword"))
        ->createField("quebra")
        ->createField("input", array("nome" => "Autenticar", "type" => "submit", "value" => "Entrar"));
        
        
        $form1->reset()->setName("Form1")
        ->setMethod("POST")
        ->createField("label", array("label" => "Nome :", "for" => "nome"))
        ->createField("input", array("nome" => "nome", "type" => "text", "id" => "idnome"))
        ->createField("quebra")
        ->createField("label", array("label" => "Sexo :", "for" => "sexo"))
        ->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "M"))
        ->createField("text", array("text" => "Masculino"))
        ->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "F"))
        ->createField("text", array("text" => "Feminino"))
        ->createField("quebra")
        ->createField("label", array("label" => "Texto :", "for" => "texto"))
        ->createField("textArea")
        ->createField("quebra")
        ->createField("input", array("nome" => "enviar", "type" => "submit", "value" => "Enviar"));
        
        $form2->reset()->setName("Form2")
        ->setMethod("POST")
        ->createField("label", array("label" => "Texto :", "for" => "texto"))
        ->createField("textArea")
        ->createField("quebra")
        ->createField("input", array("nome" => "enviar", "type" => "submit", "value" => "Enviar"));
        
        $form3->reset()->setName("Form3")
        ->setMethod("POST")
        ->createField("label", array("label" => "Sexo :", "for" => "sexo"))
        ->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "M"))
        ->createField("text", array("text" => "Masculino"))
        ->createField("input", array("nome" => "sexo", "type" => "radio", "id" => "idsexo", "value" => "F"))
        ->createField("text", array("text" => "Feminino"))
        ->createField("quebra")
        ->createField("input", array("nome" => "enviar", "type" => "submit", "value" => "Enviar"));
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