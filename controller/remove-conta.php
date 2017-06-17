<?php require_once (__DIR__."/../cabecalho.php"); ?>
<?php require_once(__DIR__."/../functions/usuario/logica-usuario.php"); ?>
<?php require_once(__DIR__."/../class/Conta.php"); ?>

<?php
$contaId = trim($_POST['id']);
$contaDao = new ContaDao();
$contaDao->removeConta($contaId);
$_SESSION["success"] = "Conta removida com sucesso";
header("Location: ../conta-lista.php");
die();

?>