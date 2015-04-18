<?php
function verificaSelecionado($nomePagina){

	$posicao = strpos($_SERVER["SCRIPT_NAME"],$nomePagina);
	return ($posicao !== false);
}