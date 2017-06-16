<?php

class ContaDao
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function buscaConta($id)
    {
        $query = "SELECT * FROM contas WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $conta = mysqli_fetch_assoc($resultado);

        return $conta;
    }

    public function listaContas()
    {
        $contas = [];
        $query = "SELECT c.*, cat.nome AS categoria, u.nome AS usuario FROM contas AS c INNER JOIN categorias AS cat ON (cat.categoria_id = c.categoria_id) INNER JOIN usuarios AS u ON (u.usuario_id = c.usuario_id)";
        $resultado = mysqli_query($this->conexao, $query);

        while ($conta_array = mysqli_fetch_assoc($resultado)) {
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

            $conta = new Conta($nome, $preco, $dataCompra, $descricao, $categoria, $usuario);
            $conta->setContaId($contaId);

            array_push($contas, $conta);
        }
        return $contas;
    }

    public function insereConta(Conta $conta)
    {

        $nome = mysqli_real_escape_string($this->conexao, $conta->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $conta->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $conta->getDescricao());

        $categoria = mysqli_real_escape_string($this->conexao, $conta->getCategoria()->categoriaId);
        $usuario = mysqli_real_escape_string($this->conexao, $conta->getUsuario()->usuarioId);
        $dataCompra = mysqli_real_escape_string($this->conexao, $conta->getDataCompra());

        $query = "INSERT INTO contas (nome, preco, descricao, categoria_id, usuario_id, data_compra) VALUES ('{$nome}', {$preco}, '{$descricao}', {$categoria}, {$usuario}, '{$dataCompra}')";

        return mysqli_query($this->conexao, $query);
    }

    public function alteraConta(Conta $conta)
    {
        $contaId = mysqli_real_escape_string($this->conexao, $conta->getContaId());
        $nome = mysqli_real_escape_string($this->conexao, $conta->getPreco());
        $preco = mysqli_real_escape_string($this->conexao, $conta->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $conta->getDescricao());

        $categoria = mysqli_real_escape_string($this->conexao, $conta->getCategoria()->categoriaId);
        $usuario = mysqli_real_escape_string($this->conexao, $conta->getUsuario()->usuarioId);
        $dataCompra = mysqli_real_escape_string($this->conexao, $conta->getDataCompra());

        $query = "UPDATE contas SET nome='{$nome}', preco={$preco}, descricao='{$descricao}', categoria_id={$categoria}, usuario_id={$usuario}, data_compra='{$dataCompra}' WHERE id = '{$contaId}'";

        return mysqli_query($this->conexao, $query);
    }

    public function removeConta($contaId)
    {
        $query = "DELETE FROM contas WHERE id={$contaId}";
        return mysqli_query($this->conexao, $query);
    }

    public function listaCompraPorPeriodo($usuario_id, $data_inicio, $data_fim, $categoria_id)
    {
        $data_inicio = reverseData($data_inicio);
        $data_fim = reverseData($data_fim);

        $contas = [];
        $query = "SELECT c.*, cat.nome AS categoria, u.nome AS usuario FROM contas AS c INNER JOIN categorias AS cat ON (cat.categoria_id = c.categoria_id) INNER JOIN usuarios AS u ON (u.usuario_id = c.usuario_id) WHERE c.data_compra BETWEEN '{$data_inicio}' AND '{$data_fim}' AND u.usuario_id='{$usuario_id}' AND c.categoria_id='{$categoria_id}'";
        $resultado = mysqli_query($this->conexao, $query);
        while ($conta = mysqli_fetch_assoc($resultado)) {
            array_push($contas, $conta);
        }
        return $contas;
    }

    public function reverseData($data)
    {

        $dataReverse = explode("-", $data);
        $dataReverse = $dataReverse[2] . "-" . $dataReverse[1] . "-" . $dataReverse[0];
        return $dataReverse;
    }

}