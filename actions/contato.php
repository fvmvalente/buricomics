<?php
header('Content-Type: text/html; charset=utf-8'); 
ini_set("display_errors",true);
error_reporting(E_ERROR | E_WARNING);
include '../util/funcoes.php';
session_start();

$_SESSION["contato"] = $_POST;

//1.Prepara a mensagem
$mensagem = "<strong>Nome:</strong> ".$_POST["conNome"];
$mensagem.= "<br/><strong>E-mail:</strong> ".$_POST["conEmail"];
$mensagem.= "<br/><strong>Idade:</strong> ".$_POST["conIdade"];
$mensagem.= "<br/><strong>Sexo:</strong> ".$_POST["conSexo"];
$mensagem.= "<br/><strong>Cidade:</strong> ".$_POST["conCidade"];
$mensagem.= "<br/><strong>Estado:</strong> ".$_POST["conEstado"];
$mensagem.= "<br/><strong>Telefone:</strong> ".$_POST["conTelefone"];
$mensagem.= "<br/><strong>Mensagem:</strong> ".$_POST["conMensagem"];

//Envia o e-mail
$destinatario = "efranco23@gmail.com";
//$remetente = trim($_POST["conEmail"]);
//$remetente = array("eder@tambacode.com.br","contato@buritech.com.br");
$nome = trim($_POST["conNome"]);
$assunto = "Contato enviado pelo site BURICOMICS";
$copia = "eder@tambacode.com.br";//O e-mail de quem vai receber cópia

//Tenta enviar o e-mail
$enviou = enviarEmail($destinatario, $remetente, $nome, $copia, $mensagem, $assunto);

if($enviou === true){
    header("location: ../contato.php");
    $_SESSION["sucesso"] = true;
} else {
    $_SESSION["erro"] = $enviou;
    $_SESSION["sucesso"] = false;
    header("location: ../contato.php");
}


