<?php require_once(__DIR__."/Conexao.php");


class ContaDao
{
    public function buscaConta($id)
    {
        $pdo = Conexao::getInstance();

        $query = "SELECT * FROM contas WHERE id = :id";
        $sth = $pdo->prepare($query);
        $sth->bindParam(":id", $id);
        $result = $sth->execute();

        $conta = $sth->fetch($result);

        return $conta;
    }

    public function listaContas()
    {
        $contas = [];
        $query = "SELECT c.*, cat.nome AS categoria, u.nome AS usuario FROM contas AS c INNER JOIN categorias AS cat ON (cat.categoria_id = c.categoria_id) INNER JOIN usuarios AS u ON (u.usuario_id = c.usuario_id)";
        $pdo = Conexao::getInstance();
        $result = $pdo->query($query);
        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $categoria = new Categoria();
            $usuario = new Usuario();

            $categoria->setCategoriaId($row["categoria_id"]);
            $categoria->setNome($row["categoria"]);

            $usuario->setUsuarioId($row["usuario_id"]);
            $usuario->setNome($row["usuario"]);

            $contaId = $row["id"];
            $nome = $row["nome"];
            $preco = $row["preco"];
            $descricao = $row["descricao"];
            $dataCompra = $row["data_compra"];

            $conta = new Conta($nome, $preco, $dataCompra, $descricao, $categoria, $usuario);
            $conta->setContaId($contaId);

            array_push($contas, $conta);
        }
        return $contas;
    }

    public function insereConta(Conta $conta)
    {
        $pdo = Conexao::getInstance();

        $query = "INSERT INTO contas (nome, preco, descricao, categoria_id, usuario_id, data_compra) VALUES (:nome, :preco, :descricao,  :categoria, :usuario, :dataCompra)";
        $sth = $pdo->prepare($query);
        $sth->bindParam(":nome", $conta->getNome());
        $sth->bindParam(":preco", $conta->getPreco());
        $sth->bindParam(":descricao", $conta->getDescricao());
        $sth->bindParam(":categoria", $conta->getCategoria()->categoriaId);
        $sth->bindParam(":usuario", $conta->getUsuario()->usuarioId);
        $sth->bindParam(":dataCompra", $conta->getDataCompra());

        return $sth->execute();

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
        $pdo = Conexao::getInstance();

        $query = "DELETE FROM contas WHERE id={$contaId}";
        return $pdo->query($query);

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