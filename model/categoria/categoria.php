<?php
require_once("config/database/conexao.php");

function listaCategorias($conexao)
{
    $categorias = [];
    $resultado = mysqli_query($conexao,"SELECT * FROM categorias");
    while($categoria = mysqli_fetch_assoc($resultado))
    {
       array_push($categorias, $categoria);
    }
    return $categorias;
}


