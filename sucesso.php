<?php 
include 'topo.php'; 

$idContato = $_SESSION["idContato"];

$query = "SELECT * FROM contato WHERE id = ".$idContato;
$retorno = $db -> query($query);
//var_dump($retorno);

var_dump($retorno);
exit;

while ($linha = $retorno -> fetch_assoc()) {
	var_dump($linha);
}

?>

<section class="conteudo">
    <div class="centralizar">

        <article class="texto">
            <h1 class="titulo">Confirmação de envio de contato</h1>

            Seu contato foi enviado com sucesso e seus dados foram
            armazenados em nosso banco de dados.<br/>
            Você pode editá-los, excluí-los ou confirmá-los abaixo:
            <br/><br/>
            <strong>Dados do usuário: </strong>
            <br/><br/>
            Nome: <br/>
            Data de nascimento:<br/>
            Sexo: <br/>
            E-mail: <br/>
            Telefone: <br/>
            Cidade: <br/>
            Estado: <br/>
            Melhor horário para contato: <br/>
            Anexo: <br/>
            Mensagem: <br/>
            
        </article>
    </div><!-- fim da centralizar -->
</section><!-- fim do conteudo -->

<?php include 'rodape.php'; ?>