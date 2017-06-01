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
        <table class="table">
            <input type="hidden" name="id" value="<?php echo $conta['id'];?>"/>
            <tr>
                <td>Nome:</td>
                <td><input class="form-control" type="text" name="nome" value="<?php echo $conta['nome'];?>"/></td>
            </tr>    
            <tr>
                <td>Preço:</td>
                <td><input class="form-control" type="number" step="any" name="preco" value="<?php echo $conta['preco'];?>"/></td>
            </tr>
            <tr>
                <td>Data da Compra:</td>
                <td><input class="datepicker" id="datepicker" name="dataCompra" value="<?php echo $conta['data_compra'];?>"/></td>
            </tr>
            <tr>
             <td>Categorias:</td>
                <td>
                    <select class="form-control" name="categoria_id">
                        <?php foreach($categorias as $categoria): 
                            $essaEhCategoriaSelecionada = $conta['categoria_id'] == $categoria['categoria_id'];
                            $selecaoUsuario = $essaEhCategoriaSelecionada ? "selected='selected'" : "";
                        
                        ?>
                            <option value="<?php echo $categoria['categoria_id'];?>" <?php echo $selecaoUsuario?>><?php echo $categoria['nome'];?></option>
                        <?php endforeach ?>
                    </select>
                </td> 
            </tr>
            <td>Dono da Conta:</td>
                <td>
                    <select class="form-control" name="usuario_id">
                        <?php foreach($usuarios as $usuario): 
                            $essaEhUsuarioSelecionado = $conta['usuario_id'] == $usuario['usuario_id'];
                            $selecaoUsuario = $essaEhUsuarioSelecionado ? "selected='selected'" : "";
                        ?>
                            <option value="<?php echo $usuario['usuario_id'];?>" <?php echo $selecaoUsuario?>> <?php echo $usuario['nome'];?></option>
                        <?php endforeach ?>
                    </select>
                </td> 
            </tr>
            <tr>
                <td>Descricao:</td>
                <td><textarea class="form-control" name="descricao"><?php echo $conta['descricao'];?></textarea>
            </tr>
            <tr>
                <td><button class="btn btn-primary" type="submit">Alterar</button></td>
            </tr>
        </table>
    </form>
<?php include("rodape.php") ?>