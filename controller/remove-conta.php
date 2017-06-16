<?php require_once(__DIR__."/../model/conta/conta.php"); ?>
<?php require_once (__DIR__."/../cabecalho.php"); ?>
<?php require_once(__DIR__."/../functions/usuario/logica-usuario.php"); ?>
<?php require_once(__DIR__."/../class/Conta.php"); ?>

<?php
$contaId = trim($_POST['id']);
$contaDao = new ContaDao($contaDao);
$contaDao->removeConta($contaId);
$_SESSION["success"] = "Conta removida com sucesso";
header("Location: ../conta-lista.php");
die();

?>