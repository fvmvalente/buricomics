<?php 
session_start();
ini_set("display_errors",true);
error_reporting(E_ERROR | E_WARNING);
include 'util/funcoes.php';
include 'config/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Buricomics - o lugar perfeito para Comic Books e HQs" />
    <meta name="keywords" content="buricomics, hq, comic, books" />

    <title>Buricomics</title>

    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

</head>
<body>

<header class="topo clearfix">
    <div class="centralizar">
        <a class="logo" href="">
            <img alt="" src="assets/img/buricomics-logo.png" />
        </a>

        <nav class="menu">
            <ul>
                <li class="menu-item">
                    <a class="menu-link <?php if(verificaSelecionado("index.php")){ echo "menu-selecionado"; }?>" href="index.php">Home</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link  <?php if(verificaSelecionado("sobre.php")){ echo "menu-selecionado"; }?>" href="sobre.php">Sobre</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="">Comic Books</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="">Blog</a>
                </li>
                <li class="menu-item">
                    <a class="menu-link <?php if(verificaSelecionado("contato.php")){ echo "menu-selecionado"; }?>" href="contato.php">Contato</a>
                </li>
            </ul>
        </nav>
    </div>
</header><!-- fim do topo -->
<?php 

setcookie("NomeVisitante", "Eder Franco", time()+3600);
//var_dump($_COOKIE["NomeVisitante"]);

?>