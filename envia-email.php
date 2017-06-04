<?php
session_start();

$nome  = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("lib/PHPMailer-master/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtps.bol.com.br';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "c.beraldi@bol.com.br";
$mail->Password = '850702';

$mail->setFrom("c.beraldi@bol.com.br", "Primeiro formulário de email");
$mail->addAddress("c.beraldi@bol.com.br");
$mail->Subject = "Email de contato para teste";
$mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}<br/></html>");
$mail->AltBody = "De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}";

if($mail->send()){
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
}else{
    $_SESSION["danger"] = "Erro ao enviar mensagem".$mail->errorInfo;
    header("Location: contato.php");
}

die();
