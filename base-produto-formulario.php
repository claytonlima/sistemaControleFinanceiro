

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
            <?php 
            foreach($usuarios as $usuario): 
                
                $essaEhUsuarioSelecionado = $conta['usuario_id'] == $usuario->usuarioId;
                $selecaoUsuario = $essaEhUsuarioSelecionado ? "selected='selected'" : "";
            ?>
                <option value="<?php echo $usuario->usuarioId;?>" <?php echo $selecaoUsuario?>> <?php echo $usuario->nome;?></option>
            <?php endforeach ?>
        </select>
    </td> 
</tr>
<tr>
    <td>Descricao:</td>
    <td><textarea class="form-control" name="descricao"><?php echo $conta['descricao'];?></textarea>
</tr>

        