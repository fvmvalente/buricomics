<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("display_errors", true);
error_reporting(E_ERROR | E_WARNING);
include '../util/funcoes.php';
session_start();
date_default_timezone_set("America/Manaus");

$_SESSION["contato"] = $_POST;

// 1.Prepara a mensagem
$mensagem = "<strong>Nome:</strong> " . $_POST["conNome"];
$mensagem .= "<br/><strong>E-mail:</strong> " . $_POST["conEmail"];
$mensagem .= "<br/><strong>Idade:</strong> " . $_POST["conIdade"];
$mensagem .= "<br/><strong>Sexo:</strong> " . $_POST["conSexo"];
$mensagem .= "<br/><strong>Cidade:</strong> " . $_POST["conCidade"];
$mensagem .= "<br/><strong>Estado:</strong> " . $_POST["conEstado"];
$mensagem .= "<br/><strong>Telefone:</strong> " . $_POST["conTelefone"];
$mensagem .= "<br/><strong>Mensagem:</strong> " . $_POST["conMensagem"];

// Envia o e-mail
$destinatario = "efranco23@gmail.com";
$remetente = trim($_POST["conEmail"]);
//$remetente = array("eder@tambacode.com.br","contato@buritech.com.br");
$nome = trim($_POST["conNome"]);
$assunto = "Contato enviado pelo site BURICOMICS";
$copia = "eder@tambacode.com.br"; // O e-mail de quem vai receber cópia
                                  
// Tenta enviar o e-mail
$enviou = enviarEmail($destinatario, $remetente, $nome, $copia, $mensagem, $assunto);
$enviou = true;
if ($enviou === true) {
    // 
    $_SESSION["sucesso"] = true;
    
    // Salva os dados no banco de dados
    // $db = mysql_connect("localhost","root","");
    // mysql_select_db("buriphp");
    
    $melhorHorario = implode(",",$_POST["conHorario"]);
    
    $query = "INSERT INTO contato(nome,email,nascimento,sexo,cidade,estado,telefone,melhorHorario,mensagem,dataCadastro)";
    $query .= " VALUES (";
    $query .= "'" . trim($_POST["conNome"]) . "',";
    $query .= "'" . trim(strtolower($_POST["conEmail"])) . "',";
    $query .= "'" . date("Y-m-d") . "',";
    $query .= "'" . $_POST["conSexo"] . "',";
    $query .= "'" . trim($_POST["conCidade"]) . "',";
    $query .= "'" . $_POST["conEstado"] . "',";
    $query .= "'" . $_POST["conTelefone"] . "',";
    $query .= "'" . $melhorHorario . "',";
    $query .= "'" . $_POST["conMensagem"] . "',";
    $query .= "'" . date("Y-m-d H:i:s") . "');";
    
    
    $db = new mysqli("localhost", "root", "", "buriphp");
    $retorno = $db->query($query);
    if($retorno === false){
        //echo "Deu zica!";
        //var_dump($db->error);
    } else {
        //echo "Funfou!";
        header("location: ../contato.php");
    }
    exit;
    
} else {
    $_SESSION["erro"] = $enviou;
    $_SESSION["sucesso"] = false;
    header("location: ../contato.php");
}


