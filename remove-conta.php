<?php require_once("model/conta/conta.php"); ?>
<?php require_once("functions/usuario/logica-usuario.php"); ?>

<?php

$id = trim($_POST['id']);
removeConta($conexao, $id);
$_SESSION["success"] = "Conta removida com sucesso";
header("Location: conta-lista.php");
die();

?>