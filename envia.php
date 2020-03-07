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
$Email_conteuto = "Nome = {$Nome} <br/>";
$Email_conteuto .= "Email = {$Email} <br/>";
$Email_conteuto .= "Mensagem = {$Mensagem} <br/>";
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

$result = mail($Email_destinatario,$Email_assunto, $Email_conteuto, $Email_headers);

if ($result) {
	echo json_encode(['sended' => true]);
} else {
	echo json_encode(['sended' => false]);
}