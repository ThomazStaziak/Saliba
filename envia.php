<!DOCTYPE HTML>

<html>
	<head>
		<title>Odontologia Saliba</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="shortcut icon" href="img/favicon.png">

	 <title>Sucesso! | Odontologia Saliba</title>
    
<?php
//CAPTURA OS VALORES PASSADOS POR URL - HTTP 

$GetParam = filter_input_array (INPUT_POST, FILTER_DEFAULT);
//ARMAZENA OS VALORES RECEBIDOS EM VARIAVEIS LOCAIS

$Nome =$_POST['Nome'];
$Email=$_POST['Email'];
$Mensagem=$_POST['Mensagem'];

//INFORMAÇÕES DA HOSPEDAGEM PARA ENVIO 
$Email_remetente = "$Email" ;
$Email_destinatario = "odontologiasaliba@gmail.com";
$Email_reply = "{$Email}";

//CRIANDO EMAIL PARA ENVIO 

$Email_assunto = "Novo contato pelo site";
$Email_conteuto = "Nome = {$Nome} \n";
$Email_conteuto .= "Email = {$Email} \n";
$Email_conteuto .= "Mensagem = {$Mensagem} \n";
$HeaderArray = array("from: $Email_remetente", //Queme está enviando o e-mail no servidor  
"Reply-To:$Email_assunto", //E-mail para resposta
"Subject: $Email_assunto", //Titulo do E-mail
"Return-Path: $Email_remetente", //E-mail existente no servirdor que envia 
"MIME-Version: 1.0", //Versão utiliza	da
"X-Priority: 3", //Priooridade do email
"Content-Type:text/html; charset=UTF-8" //È o tipo de e-mail , neste caso daria para enviar html
);

$Email_headers = implode ("\n", $HeaderArray);

//CHAMA A FUNÇÃO RESPONSAVEL POR ENVIAR EMAIL 

if (mail($Email_destinatario,$Email_assunto, $Email_conteuto, $Email_headers)) {
	
	?>
	<div class="foi" id="mensagemtexto">
<style>
	#mensagemtexto {font-size: 15px;font-family: 'Zilla Slab', serif; font-size: 20px;
    margin-bottom: 2.5em;
    max-width: 1000px;}

   
	
</style>

<p>Sua mensagem foi enviada! Responderemos em até 48hrs.</p> 
<a href="index.php"> Voltar ao site</a>
</div>

<?php

}else{
	?>
	<div class="trigger trigger trigger-error">
	<p>Erro ao enviar o comentário</p>
	</div>
	<?php
}
	
?>
</body>
</html>