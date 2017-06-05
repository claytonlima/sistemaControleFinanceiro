<?php include("cabecalho.php"); ?>
<?php include("conexao.php"); ?>
<?php include("model/categoria/categoria.php"); ?>
<?php include("model/conta/conta.php"); ?>
<?php include("model/usuario/usuario.php"); ?>

<?php 
$id = $_GET['id'];
$conta = buscaConta($conexao, $id);

$categorias = listaCategorias($conexao);
$usuarios = listaUsuarios($conexao); 
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
    $( "#datepicker" ).datepicker(
        { dateFormat: 'dd-mm-yy' }
    );
  } );
</script>

    <h1>Formulário de alteração de Conta</h1>
    <form action="altera-conta.php" method="post">
        <input type="hidden" name="id" value="<?php echo $conta['id'];?>"/>
        <table class="table">
            <?php include("base-produto-formulario.php"); ?>
        </table> 
    <tr>
        <td><button class="btn btn-primary" type="submit">Alterar</button></td>
    </tr>
    </form>
    
<?php include("rodape.php") ?>