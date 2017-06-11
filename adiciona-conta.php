<?php require_once ("model/conta/conta.php"); ?>
<?php require_once ("cabecalho.php"); ?>
<?php require_once ("functions/usuario/logica-usuario.php"); ?>
<?php require_once("class/Conta.php"); ?>

<?php



$categoria = new Categoria();
$categoria->setCategoriaId($_POST['categoria_id']);

$usuario = new Usuario();
$usuario->setUsuarioId($_POST['usuario_id']);

verificaUsuarioLogado();



$conta = new Conta();
$conta->setNome($_POST['nome']); 
$conta->setPreco($_POST['preco']);
$conta->setDescricao($_POST['descricao']);
$conta->setCategoria($categoria);
$conta->setUsuario($usuario);

$data_compra = $_POST['dataCompra'];
//Formatando data para Salvar no banco;
$data_compra = explode("-", $data_compra);
$conta->setDataCompra($data_compra[2]."-".$data_compra[1]."-".$data_compra[0]);

if(insereConta($conexao, $conta)){?>
<?php 
    header("Location: conta-lista.php?add=true");
    die();
} else { 
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">A conta <?php echo $conta->getNome(); ?> não foi adicionada: <?php echo $msg;?></p>
<?php 
}
?>

<?php include ("rodape.php"); ?>