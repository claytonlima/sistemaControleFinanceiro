<?php include ("conexao.php"); ?>
<?php include ("model/conta/conta.php"); ?>
<?php include ("cabecalho.php"); ?>
<?php include ("functions/usuario/logica-usuario.php"); ?>

<?php include ("class/Conta.php"); ?>

<?php

$conta = new Conta();

verificaUsuarioLogado();

$conta->nome = $_POST['nome']; 
$conta->preco = $_POST['preco'];
$conta->descricao = $_POST['descricao'];
$conta->categoria = $_POST['categoria_id'];
$conta->donoConta = $_POST['usuario_id'];

$data_compra = $_POST['dataCompra'];
//Formatando data para Salvar no banco;
$data_compra = explode("-", $data_compra);
$conta->dataCompra = $data_compra[2]."-".$data_compra[1]."-".$data_compra[0];

if(insereConta($conexao, $conta)){?>
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