<?php 
include ("functions/usuario/logica-usuario.php");

verificaUsuarioLogado();

?>


<?php include("cabecalho.php"); ?>
<?php include("model/categoria/categoria.php"); ?>
<?php include("model/usuario/usuario.php"); ?>
<?php include("conexao.php"); ?>
<?php $categorias = listaCategorias($conexao); ?>

<?php $usuarios = listaUsuarios($conexao); ?>
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
    <form action="adiciona-conta.php" method="post">
        <table class="table">
            <tr>
                <td>Nome:</td>
                <td><input class="form-control" type="text" name="nome"/></td>
            </tr>    
            <tr>
                <td>Preço:</td>
                <td><input class="form-control" type="number" step="any" name="preco"/></td>
            </tr>
            <tr>
                <td>Data da Compra:</td>
                <td><input class="datepicker" id="datepicker" name="dataCompra"/></td>
            </tr>
            <tr>
             <td>Categorias:</td>
                <td>
                    <select class="form-control" name="categoria_id">
                        <?php foreach($categorias as $categoria): ?>
                            <option value="<?php echo $categoria['categoria_id'];?>"> <?php echo $categoria['nome'];?></option>
                        <?php endforeach ?>
                    </select>
                </td> 
            </tr>
            <tr>
            <td>Dono da Conta:</td>
                <td>
                    <select class="form-control" name="usuario_id">
                        <?php foreach($usuarios as $usuario): ?>
                            <option value="<?php echo $usuario['usuario_id'];?>"> <?php echo $usuario['nome'];?></option>
                        <?php endforeach ?>
                    </select>
                </td> 
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><textarea class="form-control" name="descricao"></textarea>
            </tr>
            <tr>
                <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
            </tr>
        </table>
    </form>
<?php include("rodape.php") ?>