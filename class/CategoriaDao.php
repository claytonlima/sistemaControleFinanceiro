<?php

class CategoriaDao
{
    public function listaCategorias()
    {
        $pdo = Conexao::getInstance();

        $query = "SELECT * FROM categorias";
        $result = $pdo->query($query);
        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);

        $categorias = [];
        foreach($rows as $row)
        {
            $categoria = new Categoria();
            $categoria->categoriaId = $row["categoria_id"];
            $categoria->nome = $row["nome"];

            array_push($categorias, $categoria);
        }
        return $categorias;
    }

}