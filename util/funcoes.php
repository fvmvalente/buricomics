<?php
require "phpMailer/class.phpmailer.php";

function verificaSelecionado($nomePagina){

	$posicao = strpos($_SERVER["SCRIPT_NAME"],$nomePagina);
	return ($posicao !== false);
}

function enviarEmail($destinatario,$remetente,$nome,$copia,$mensagem,$assunto){
	$config = parse_ini_file("../config/config.ini",true);
	
	
	$mail = new PHPMailer();
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = $config["EMAIL"]["host"]; // Endereço do servidor SMTP
	$mail->SMTPAuth = true; // Usa autenticaçao SMTP? (opcional)
	$mail->Username = $config["EMAIL"]["username"]; // Usuário do servidor SMTP
	$mail->Password = $config["EMAIL"]["password"]; // Senha do servidor SMTP
	$mail->Port = $config["EMAIL"]["port"];
	$mail->Subject = $assunto; // Assunto
	$mail->MsgHTML($mensagem); // Conteúdo
	$mail->From = $remetente; // E-mail de quem envia
	$mail->FromName = $nome; // Nome de quem envia
    
    if(is_array($destinatario)){//Se veio um array, insere cada email
        foreach($destinatario as $dest){
            $mail->AddAddress($dest);//Para quem vai a mensagem
        }
    } else {
        //Adiciona somente 1 e-mail
        $mail->AddAddress($destinatario);//Para quem vai a mensagem
    }
    
    $mail->AddCC($copia);//Receptor de cópia da mensagem
    //$mail->AddBCC();//Recpetor de cópia oculta da mensagem
    $enviou = @$mail->Send(); // Realiza o envio (retorna true/false)
    
    if(!$enviou){
        return $mail->ErrorInfo;
    }
    return $enviou;
}

function enviaArquivo($arquivo){
    
    $retorno = array();
    
	//Verifica se ocorreu erro no upload
	if($arquivo["error"] == UPLOAD_ERR_OK){
		//Verifica se o diretorio existe
		if(!is_dir("arquivos/")){
			mkdir("arquivos/");
		}
		//Move o arquivo
		$temp = $arquivo["tmp_name"];
		$extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION);
		$novo_nome = "arquivo-usuario-".date("dmYHis").".".$extensao;
		$novo_local = "arquivos/".$novo_nome;
		$resultado = move_uploaded_file($temp, $novo_local);

		//Verifica se o arquivo foi movido
		if($resultado){
			//Verifica se o arquivo existe no novo local
			if(is_file($novo_local)){
				$retorno["erro"] = false; 
				$retorno["nomeArquivo"] = $novo_nome;
				$retorno["mensagem"] = "Deu tudo certo e o arquivo está em: <br/>".$novo_local;
			} else {
			    $retorno["erro"] = true;
			    $retorno["nomeArquivo"] = "";
				$retorno["mensagem"] = "O arquivo foi carregado, mas não foi movido.";
			}
		} else {
		    $retorno["erro"] = true;
		    $retorno["nomeArquivo"] = "";
			$retorno["mensagem"] = "Não foi possível mover o arquivo.";
		}
	} else {
	    $retorno["erro"] = true;
	    $retorno["nomeArquivo"] = "";
		$retorno["mensagem"] = "Ocorreu um erro: ".$arquivo["error"];
	}
	return $retorno;
}//Fim função


function validaData($data){
	//Se a variável tem valor
	if(!empty($data)){

		$idade = trim($data);
		$tamanho = strlen($idade);
		$arrayIdade = explode("/",$idade);
		$dia = strlen($arrayIdade[0]);
		$mes = strlen($arrayIdade[1]);
		$ano = strlen($arrayIdade[2]);

		//Verifica os tamanhos das informações
		return ($tamanho == 10 && ($dia == 2 && $mes == 2 && $ano == 4));
	} 
	return false;
}

function formataDataBanco($data){
    
	$arrayData = explode("/",trim($data));
	$dia = $arrayData[0];
	$mes = $arrayData[1];
	$ano = $arrayData[2];
	$date = $ano.'-'.$mes.'-'.$dia.' 00:00:00';
	return date("Y-m-d H:i:s",strtotime($date));
}

function enviaContato($contato){
    // 1.Prepara a mensagem
    $mensagem = "<strong>Nome:</strong> " . $contato["conNome"];
    $mensagem .= "<br/><strong>E-mail:</strong> " . $contato["conEmail"];
    $mensagem .= "<br/><strong>Idade:</strong> " . $contato["conIdade"];
    $mensagem .= "<br/><strong>Sexo:</strong> " . $contato["conSexo"];
    $mensagem .= "<br/><strong>Cidade:</strong> " . $contato["conCidade"];
    $mensagem .= "<br/><strong>Estado:</strong> " . $contato["conEstado"];
    $mensagem .= "<br/><strong>Telefone:</strong> " . $contato["conTelefone"];
    $mensagem .= "<br/><strong>Mensagem:</strong> " . $contato["conMensagem"];
    
    // Envia o e-mail
    $destinatario = "efranco23@gmail.com";
    $remetente = trim($contato["conEmail"]);
    //$remetente = array("eder@tambacode.com.br","contato@buritech.com.br");
    $nome = trim($contato["conNome"]);
    $assunto = "Contato enviado pelo site BURICOMICS";
    $copia = "eder@tambacode.com.br"; // O e-mail de quem vai receber cópia
    
    // Tenta enviar o e-mail
    return enviarEmail($destinatario, $remetente, $nome, $copia, $mensagem, $assunto);
}