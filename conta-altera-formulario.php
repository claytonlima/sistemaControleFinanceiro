<?php include("cabecalho.php"); ?>
<?php
$contaDao = new ContaDao();
$conta = $contaDao->buscaConta(trim($_GET['id']));

$categoriaDao = new CategoriaDao();
$categorias = $categoriaDao->listaCategorias();

$usuarioDao = new UsuarioDao();
$usuarios = $usuarioDao->listaUsuarios();
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
    <form action="controller/altera-conta.php" method="post">
        <input type="hidden" name="id" value="<?php echo $conta['id'];?>"/>
        <table class="table">
            <?php include("base-produto-formulario.php"); ?>
        </table> 
    <tr>
        <td><button class="btn btn-primary" type="submit">Alterar</button></td>
    </tr>
    </form>
    
<?php include("rodape.php") ?>