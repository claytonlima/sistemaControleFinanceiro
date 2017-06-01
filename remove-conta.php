<?php include("conexao.php"); ?>
<?php include("model/conta/conta.php"); ?>
<?php include("functions/usuario/logica-usuario.php"); ?>

<?php

$id = $_POST['id'];
removeConta($conexao, $id);
$_SESSION["success"] = "Conta removida com sucesso";
header("Location: conta-lista.php");
die();

?>