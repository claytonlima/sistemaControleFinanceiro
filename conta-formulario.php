<?php 
require_once("functions/usuario/logica-usuario.php");

verificaUsuarioLogado();

$conta = array("nome" => "", "preco" => "", "data_compra" => "", "descricao" => "", "categoria_id" => "1", "usuario_id" => "1");

?>

<?php require_once("cabecalho.php"); ?>
<?php

$categoriaDao = new CategoriaDao();
$categorias = $categoriaDao->listaCategorias(); ?>

<?php

$usuarioDao = new UsuarioDao();
$usuarios = $usuarioDao->listaUsuarios(); ?>

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

    <h1>Cadastro de Conta</h1>
    <form action="controller/adiciona-conta.php" method="post">
        <table class="table">
            <?php include("base-produto-formulario.php"); ?>
        </table>
    <tr>
        <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
    </tr>
    </form>
    
<?php include("rodape.php") ?>