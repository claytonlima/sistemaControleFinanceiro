<?php

class UsuarioDao
{
   public function listaUsuarios()
    {
        $pdo = Conexao::getInstance();

        $query = "SELECT * FROM usuarios";
        $result = $pdo->query($query);
        $rows = $result->fetchAll(\PDO::FETCH_ASSOC);

        $usuarios  = [];

        foreach($rows as $row)
        {
            $user = new Usuario();
            $user->usuarioId = $row["usuario_id"];
            $user->nome      = $row["nome"];

            array_push($usuarios, $user);
        }

        return $usuarios;
    }

    public function buscaUsuario(Usuario $user){
        $pdo = Conexao::getInstance();

        $query = "SELECT email, senha FROM usuarios WHERE email=:email AND senha=:senha";
        $sth = $pdo->prepare($query);
        $sth->execute(array
                           (":email" => $user->email,
                            ":senha"=> md5($user->senha)
                           )
                     );

        $user = $sth->fetch(\PDO::FETCH_ASSOC);

        return $user;
    }
}