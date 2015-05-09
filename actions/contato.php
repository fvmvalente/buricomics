<?php
header('Content-Type: text/html; charset=utf-8');
ini_set("display_errors", true);
error_reporting(E_ERROR | E_WARNING);
include '../util/funcoes.php';
session_start();
date_default_timezone_set("America/Manaus");


$_SESSION["contato"] = $_POST;

//Validar data
if(!validaData($_POST["conIdade"])){
    $_SESSION["erro"] = "Formato da data de nascimento está inválido.";
    $_SESSION["sucesso"] = false;
    header("location: ../contato.php");
    exit;
}

//Fazendo upload do arquivo
$retornoArquivo = enviaArquivo($_FILES["arquivoAnexo"]);
$nomeArquivo = "";
if(!$retornoArquivo["erro"]){
    $nomeArquivo = $retornoArquivo["nomeArquivo"];
}

//Formatando a data de nascimento para salvar no banco
$nascimento = formataDataBanco($_POST["conIdade"]);

if (enviaContato($_POST,$nomeArquivo)) {
    
    $melhorHorario = implode(",",$_POST["conHorario"]);
    
    $query = "INSERT INTO contato(nome,email,nascimento,sexo,cidade,estado,telefone,melhorHorario,mensagem,dataCadastro,arquivoAnexo)";
    $query .= " VALUES (";
    $query .= "'" . trim($_POST["conNome"]) . "',";
    $query .= "'" . trim(strtolower($_POST["conEmail"])) . "',";
    $query .= "'" . $nascimento. "',";
    $query .= "'" . $_POST["conSexo"] . "',";
    $query .= "'" . trim($_POST["conCidade"]) . "',";
    $query .= "'" . $_POST["conEstado"] . "',";
    $query .= "'" . $_POST["conTelefone"] . "',";
    $query .= "'" . $melhorHorario . "',";
    $query .= "'" . $_POST["conMensagem"] . "',";
    $query .= "'" . date("Y-m-d H:i:s") . "',";
    $query .= "'" . $nomeArquivo . "');";
    
    $db = new mysqli("localhost", "root", "", "buriphp");
    $retorno = $db->query($query);
    $idContato = $db->insert_id;
    
    if($retorno !== false){
        $_SESSION["idContato"] = $idContato;
        header("location: ../sucesso.php");
    } else {
        $_SESSION["erro"] = false;
        $_SESSION["sucesso"] = true;
        header("location: ../contato.php");
    }
    
} else {
    $_SESSION["erro"] = $enviou;
    $_SESSION["sucesso"] = false;
    header("location: ../contato.php");
}


