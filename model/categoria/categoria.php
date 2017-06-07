<?php
require_once("config/database/conexao.php");
require_once("class/Categoria.php");

function listaCategorias($conexao)
{
    $categorias = [];
    $resultado = mysqli_query($conexao,"SELECT * FROM categorias");
    while($categoria_array = mysqli_fetch_assoc($resultado))
    {   
       $categoria = new Categoria();
       $categoria->categoriaId = $categoria_array["categoria_id"];
       $categoria->nome = $categoria_array["nome"];

       array_push($categorias, $categoria);
    }
    return $categorias;
}


