<?php require_once ("cabecalho.php"); ?>
<?php require_once ("model/conta/conta.php"); ?>
<?php require_once("class/Conta.php"); ?>

<?php

$usuario = new Usuario();
$usuario->setUsuarioId($_POST['usuario_id']);

$categoria = new Categoria();
$categoria->setCategoriaId($_POST['categoria_id']);

$contaId = trim($_POST['id']);
$nome = trim($_POST['nome']);
$preco = trim($_POST['preco']);
$descricao = trim($_POST['descricao']);
$dataCompra = trim($_POST['dataCompra']);

$conta = new Conta($contaId, $nome, $preco, $dataCompra, $descricao, $categoria, $usuario);

if(alteraConta($conexao, $conta)){?>
    <p class="text-success">O conta <?php echo $conta->getNome();?>, <?php echo $conta->getPreco(); ?> foi alterado.</p>
<?php } else { 
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O conta <?php echo $conta->getNome(); ?> não foi alterado: <?php echo $msg;?></p>
<?php 
}
?>

<?php include("rodape.php");