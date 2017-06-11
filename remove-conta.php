<?php require_once("model/conta/conta.php"); ?>
<?php require_once("functions/usuario/logica-usuario.php"); ?>
<?php require_once("class/Conta.php"); ?>

<?php
$contaId = trim($_POST['id']);

removeConta($conexao, $contaId);
$_SESSION["success"] = "Conta removida com sucesso";
header("Location: conta-lista.php");
die();

?>