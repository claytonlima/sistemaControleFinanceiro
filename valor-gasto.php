<?php include("cabecalho.php"); ?>
<?php include("model/categoria/categoria.php"); ?>
<?php include("model/conta/conta.php"); ?>
<?php include("model/usuario/usuario.php"); ?>
<?php include("conexao.php"); ?>
<?php $categorias = listaCategorias($conexao); ?>

<?php $usuarios = listaUsuarios($conexao); ?>

<?php

    $renda  = $_POST['renda']; 
    $usuario_id  = $_POST['usuario_id'];
    $data_inicio = $_POST['dataCompraInicio'];
    $data_fim = $_POST['dataCompraFim']; 
    $categoria_id  = $_POST['categoria_id'];
    
    $compras = listaCompraPorPeriodo($conexao, $usuario_id, $data_inicio, $data_fim, $categoria_id);
    
    $valor_gasto = 0;
    foreach($compras as $compra){
        $valor_gasto += $compra['preco'];
    }

?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(function() {
    $( "#datepickerInicio" ).datepicker(
        { dateFormat: 'dd-mm-yy' }
    );
     $( "#datepickerFim" ).datepicker(
        { dateFormat: 'dd-mm-yy' }
    );
    
  } );
</script>

<h1>Lista de Compras</h1>
    <form action="valor-gasto.php" method="post">
        <table class="table">
            <tr>
                <td>Renda para Cálculo:</td>
                <td><input class="form-control" type="number" step="any" name="renda" value="<?php echo $renda ;?>"/></td>
            </tr>
            
            <tr>
                <td>Período da Compra - Inicio:</td>
                <td><input class="datepicker" id="datepickerInicio" name="dataCompraInicio" value="<?php echo $data_inicio ;?>"/></td>
            </tr>
            <tr>
            <tr>
                <td>Período da Compra - Fim:</td>
                <td><input class="datepicker" id="datepickerFim" name="dataCompraFim" value="<?php echo $data_fim ;?>"/></td>
            </tr>
            <tr>
             <td>Categorias:</td>
                <td>
                    <select class="form-control" name="categoria_id">
                        <?php foreach($categorias as $categoria): 
                            $essaEhCategoriaSelecionada = $categoria_id == $categoria_id['categoria_id'];
                            $selecaoCategoria = $essaEhCategoriaSelecionada ? "selected='selected'" : "";
                        
                        ?>
                            <option value="<?php echo $categoria['categoria_id'];?>" <?php echo $selecaoCategoria ?>> <?php echo $categoria['nome'];?></option>
                        <?php endforeach ?>
                    </select>
                </td> 
            </tr>
            <tr>
            <td>Dono da Conta:</td>
                <td>
                    <select class="form-control" name="usuario_id">
                        <?php foreach($usuarios as $usuario): 
                            $essaEhUsuarioSelecionado = $usuario_id == $usuario['usuario_id'];
                            $selecaoUsuario = $essaEhUsuarioSelecionado ? "selected='selected'" : "";
                        ?>
                            <option value="<?php echo $usuario['usuario_id'];?>"<?php echo $selecaoUsuario ?>> <?php echo $usuario['nome'];?></option>
                        <?php endforeach ?>
                    </select>
                </td> 
            </tr>
            <tr>
                <td><button class="btn btn-success" type="submit">Pesquisar</button></td>
            </tr>
        </table>
    </form>

<?php if(isset($renda) && isset($usuario_id) && isset($data_inicio) && isset($data_fim)):?>
    <center><h3>Consulta das compras feitas por(a)<span class="label label-default"><?php echo $compras[0]['usuario']; ?></span></h3></center><br/>
    <p class="text alert-info" role="alert">Renda Mensal: R$ <?php echo round($renda,2);?></p>
    <?php if($valor_gasto > 0):?>
        <p class="text alert-danger" role="alert">Valor gasto no período Consultado: R$ <?php echo round($valor_gasto,2);?></p>
    <?php else: ?>
        <p class="text alert-info" role"alert">Parabéns você não gastou no período consultado</p>
    <?php endif ?>
    <p class="text alert-warning" role="alert">Disponivel do Salário: R$ <?php echo round($renda - $valor_gasto,2);?></p><br/>
    <?php if(sizeof($compras) > 0 ): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <th>Compra</th>
                <th>Valor da compra</th>
                <th>Categoria da compra</th>
                <th>Dono(a) da conta</th>
                <th>Data da compra</th>
                <th colspan="2">Ações</th>
            </thead>    
            <?php
                foreach($compras as $compra): 
            ?>
            <tbody>
                <tr>
                    <td><?php echo $compra['nome'];?></td>
                    <td>R$ <?php echo $compra['preco'];?></td>
                    <td><?php echo $compra['categoria'];?></td>
                    <td><?php echo $compra['usuario'];?></td>
                    <td><?php echo $compra['data_compra'];?></td>
                    <td>
                        <a class="btn btn-primary" href="conta-altera-formulario.php?id=<?php echo $compra['id']; ?>">Alterar</a>
                    </td>
                        <form action="remove-conta.php" method="post">
                            <td>
                                <input type="hidden" name="id" value="<?php echo $compra['id']; ?>" />
                                <button class="btn btn-danger">Deletar</button>
                            </td>
                        </form>
                    </td>
                </tr>
            </tbody>    
            <?php endforeach ?>
        </table>
        <?php else: ?>
            <center><p class="text alert-warning">Não há compras para listar</p></center>
        <?php endif ?>    
<?php endif ?>

<?php include("rodape.php") ?>