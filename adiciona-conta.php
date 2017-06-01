<?php include ("conexao.php"); ?>
<?php include ("model/conta/conta.php"); ?>
<?php include ("cabecalho.php"); ?>
<?php include ("functions/usuario/logica-usuario.php"); ?>

<?php

verificaUsuarioLogado();

$nome = $_POST['nome']; 
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
$usuario_id = $_POST['usuario_id'];

$data_compra = $_POST['dataCompra'];
//Formatando data para Salvar no banco;
$data_compra = explode("-", $data_compra);
$data_compra = $data_compra[2]."-".$data_compra[1]."-".$data_compra[0];

if(insereConta($conexao, $nome, $preco, $descricao, $categoria_id, $usuario_id, $data_compra)){?>
<?php 
    header("Location: conta-lista.php?add=true");
    die();
} else { 
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">A conta <?php echo $nome; ?> não foi adicionada: <?php echo $msg;?></p>
<?php 
}
?>

<?php include ("rodape.php"); ?>