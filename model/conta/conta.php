<?php

function buscaConta($conexao, $id)
{
    
    $resultado = mysqli_query($conexao,"SELECT * FROM contas WHERE id = {$id}");
    $conta = mysqli_fetch_assoc($resultado);
    return $conta;
}

function listaContas($conexao)
{
    $contas = [];
    $resultado = mysqli_query($conexao,"SELECT c.*, cat.nome AS categoria, u.nome AS usuario FROM contas AS c INNER JOIN categorias AS cat ON (cat.categoria_id = c.categoria_id) INNER JOIN usuarios AS u ON (u.usuario_id = c.usuario_id)");
    while($conta = mysqli_fetch_assoc($resultado))
    {
       array_push($contas, $conta);
    }
    return $contas;
}

function insereConta($conexao, $nome, $preco, $descricao, $categoria_id, $usuario_id, $data_compra)
{
    $query = "INSERT INTO contas (nome, preco, descricao, categoria_id, usuario_id, data_compra) VALUES ('{$nome}', $preco, '{$descricao}', {$categoria_id}, {$usuario_id}, '{$data_compra}')";
    return mysqli_query($conexao, $query);
}

function alteraConta($conexao,$id, $nome, $preco, $descricao, $categoria_id, $usuario_id, $data_compra)
{
    $query = "UPDATE contas SET nome='{$nome}', preco={$preco}, descricao='{$descricao}', categoria_id={$categoria_id}, usuario_id={$usuario_id}, data_compra='{$data_compra}' WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeConta($conexao, $id)
{
    $query = "DELETE FROM contas WHERE id={$id}";
    return mysqli_query($conexao, $query);
}

function listaCompraPorPeriodo($conexao, $usuario_id, $data_inicio, $data_fim, $categoria_id)
{
    $data_inicio = reverseData($data_inicio);
    $data_fim = reverseData($data_fim); 
    
    $contas = [];
    $resultado = mysqli_query($conexao,"SELECT c.*, cat.nome AS categoria, u.nome AS usuario FROM contas AS c INNER JOIN categorias AS cat ON (cat.categoria_id = c.categoria_id) INNER JOIN usuarios AS u ON (u.usuario_id = c.usuario_id) WHERE c.data_compra BETWEEN '{$data_inicio}' AND '{$data_fim}' AND u.usuario_id='{$usuario_id}' AND c.categoria_id='{$categoria_id}'");
    while($conta = mysqli_fetch_assoc($resultado))
    {
       array_push($contas, $conta);
    }
    return $contas;
}

function reverseData($data){

    $dataReverse = explode("-", $data);
    $dataReverse = $dataReverse[2]."-".$dataReverse[1]."-".$dataReverse[0];
    return $dataReverse;
}

