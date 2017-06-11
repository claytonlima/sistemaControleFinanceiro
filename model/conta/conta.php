<?php
require_once("config/database/conexao.php");
require_once("class/Conta.php");
require_once("class/Categoria.php");
require_once("class/Usuario.php");

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
    
    while($conta_array = mysqli_fetch_assoc($resultado))
    {
       $categoria = new Categoria();
       $usuario = new Usuario();

       $categoria->setCategoriaId($conta_array["categoria_id"]);
       $categoria->setNome($conta_array["categoria"]);
       
       $usuario->setUsuarioId($conta_array["usuario_id"]);
       $usuario->setNome($conta_array["usuario"]);

       $contaId = $conta_array["id"];
       $nome = $conta_array["nome"];
       $preco = $conta_array["preco"];
       $descricao = $conta_array["descricao"];
       $dataCompra = $conta_array["data_compra"];
       
       $conta = new Conta($contaId , $nome, $preco, $dataCompra, $descricao,  $categoria, $usuario);

        array_push($contas, $conta);
    }
    return $contas;
}

function insereConta($conexao, Conta $conta)
{

    $nome = mysqli_real_escape_string($conexao, $conta->getNome());
    $preco = mysqli_real_escape_string($conexao, $conta->getPreco());
    $descricao = mysqli_real_escape_string($conexao, $conta->getDescricao());

    $categoria = mysqli_real_escape_string($conexao, $conta->getCategoria()->categoriaId);
    $usuario = mysqli_real_escape_string($conexao, $conta->getUsuario()->usuarioId);
    $dataCompra = mysqli_real_escape_string($conexao, $conta->getDataCompra());

    $query = "INSERT INTO contas (nome, preco, descricao, categoria_id, usuario_id, data_compra) VALUES ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usuario}, '{$dataCompra}')";

    return mysqli_query($conexao, $query);
}

function alteraConta($conexao, Conta $conta)
{

    $conta->contaId = mysqli_real_escape_string($conexao, $conta->contaId);
    $conta->nome = mysqli_real_escape_string($conexao, $conta->nome);
    $conta->preco = mysqli_real_escape_string($conexao, $conta->preco);
    $conta->descricao = mysqli_real_escape_string($conexao, $conta->descricao);

    $conta->categoria = mysqli_real_escape_string($conexao, $conta->categoria);
    $conta->donoConta = mysqli_real_escape_string($conexao, $conta->donoConta);
    $conta->dataCompra = mysqli_real_escape_string($conexao, $conta->dataCompra);

    $query = "UPDATE contas SET nome='{$conta->nome}', preco={$conta->preco}, descricao='{$conta->descricao}', categoria_id={$conta->categoria}, usuario_id={$conta->donoConta}, data_compra='{$conta->dataCompra}' WHERE id = '{$conta->contaId}'";
    
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

