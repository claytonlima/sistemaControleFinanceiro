<?php
require_once("class/Mensagem.php");
require_once("lib/PHPMailer-master/PHPMailerAutoload.php");

session_start();

$mensagem = new Mensagem();

$mensagem->nome     = $_POST["nome"];
$mensagem->email    = $_POST["email"];
$mensagem->mensagem = $_POST["mensagem"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtps.bol.com.br';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "c.beraldi@bol.com.br";
$mail->Password = 'Vazio';

$mail->setFrom("c.beraldi@bol.com.br", "Primeiro formulário de email");
$mail->addAddress("c.beraldi@bol.com.br");
$mail->Subject = "Email de contato para teste";
$mail->msgHTML("<html>De: {$mensagem->nome}<br/>Email: {$mensagem->email}<br/>Mensagem: {$mensagem->mensagem}<br/></html>");
$mail->AltBody = "De: {$mensagem->nome}\nEmail: {$mensagem->email}\nMensagem: {$mensagem->mensagem}";

if($mail->send()){
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
}else{
    $_SESSION["danger"] = "Erro ao enviar mensagem".$mail->errorInfo;
    header("Location: contato.php");
}

die();
