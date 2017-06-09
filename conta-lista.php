<?php require_once("cabecalho.php"); ?>
<?php require_once("model/conta/conta.php"); ?>
<?php require_once("functions/usuario/logica-usuario.php"); ?>

<?php 

verificaUsuarioLogado();

$contas = listaContas($conexao); ?>

<?php if(isset($contas) && sizeof($contas) > 0): ?>
<table class="table table-striped table-bordered">
    <thead>
        <th>Compra</th>
        <th>Valor da compra</th>
        <th>Descrição da compra</th>
        <th>Categoria da compra</th>
        <th>Dono(a) da conta</th>
        <th>Data da compra</th>
        <th colspan="2">Ações</th>
    </thead>    
    <?php
            foreach($contas as $conta):?>
    <tbody>
        <tr>
            <td><?php echo $conta->getNome();?></td>
            <td>R$ <?php echo $conta->getPreco();?></td>
            <td><?php echo substr($conta->getDescricao(), 0,40);?></td>
            <td><?php echo $conta->getCategoria()->nome;?></td>
            <td><?php echo $conta->getDonoConta()->nome;?></td>
            <td><?php echo $conta->getDataCompra();?></td>
            <td>
                <a class="btn btn-primary" href="conta-altera-formulario.php?id=<?php echo $conta->getContaId(); ?>">Alterar</a>
            </td>
                <form action="remove-conta.php" method="post">
                    <td>
                        <input type="hidden" name="id" value="<?php echo $conta->contaId; ?>" />
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

<?php include("rodape.php");?>