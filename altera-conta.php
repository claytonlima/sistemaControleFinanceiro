<?php include ("cabecalho.php"); ?>
<?php include ("conexao.php"); ?>
<?php include ("model/conta/conta.php"); ?>

<?php

$id = $_POST['id'];
$nome = $_POST['nome']; 
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
$usuario_id = $_POST['usuario_id'];

$usuario_id = $_POST['usuario_id'];

$data_compra = $_POST['dataCompra'];

if(alteraConta($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usuario_id, $data_compra)){?>
    <p class="text-success">O conta <?php echo $nome;?>, <?php echo $preco; ?> foi alterado.</p>
<?php } else { 
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O conta <?php echo $nome; ?> não foi alterado: <?php echo $msg;?></p>
<?php 
}
?>

<?php include("rodape.php");