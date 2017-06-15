<?php
require_once(__DIR__."/../config/database/conexao.php");

class CategoriaDao
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listaCategorias()
    {
        $categorias = [];
        $resultado = mysqli_query($this->conexao,"SELECT * FROM categorias");
        while($categoria_array = mysqli_fetch_assoc($resultado))
        {
            $categoria = new Categoria();
            $categoria->categoriaId = $categoria_array["categoria_id"];
            $categoria->nome = $categoria_array["nome"];

            array_push($categorias, $categoria);
        }
        return $categorias;
    }

}