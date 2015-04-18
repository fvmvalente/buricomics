<?php
require "phpMailer/class.phpmailer.php";

function verificaSelecionado($nomePagina){

	$posicao = strpos($_SERVER["SCRIPT_NAME"],$nomePagina);
	return ($posicao !== false);
}

function enviarEmail($destinatario,$remetente,$nome,$copia,$mensagem,$assunto){
    
    $mail = new PHPMailer();
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = 'mail.khi.by'; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Usa autenticaçao SMTP? (opcional)
    $mail->Username = 'alunos@khi.by'; // Usuário do servidor SMTP
    $mail->Password = 'alunos@php1'; // Senha do servidor SMTP
    $mail->Port = 26;
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