<?php require_once ("cabecalho.php"); ?>
<?php require_once ("model/conta/conta.php"); ?>
<?php require_once("class/Conta.php"); ?>

<?php

$conta = new Conta();

$conta->contaId = $_POST['id'];
$conta->nome = $_POST['nome']; 
$conta->preco = $_POST['preco'];
$conta->descricao = $_POST['descricao'];
$conta->categoria = $_POST['categoria_id'];
$conta->donoConta = $_POST['usuario_id'];
$conta->dataCompra = $_POST['dataCompra'];

if(alteraConta($conexao, $conta)){?>
    <p class="text-success">O conta <?php echo $conta->nome;?>, <?php echo $conta->preco; ?> foi alterado.</p>
<?php } else { 
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O conta <?php echo $nome; ?> não foi alterado: <?php echo $msg;?></p>
<?php 
}
?>

<?php include("rodape.php");