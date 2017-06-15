<?php
require_once(__DIR__."/../config/database/conexao.php");

class UsuarioDao
{
    private $conexao;

    function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function listaUsuarios()
    {
        $usuarios = [];
        $query = "SELECT * FROM usuarios";

        $resultado = mysqli_query($this->conexao, $query);
        while($usuario_array = mysqli_fetch_assoc($resultado))
        {
            $user = new Usuario();
            $user->usuarioId = $usuario_array["usuario_id"];
            $user->nome      = $usuario_array["nome"];

            array_push($usuarios, $user);
        }

        return $usuarios;
    }

    public function buscaUsuario(Usuario $user){
        $user->email = mysqli_real_escape_string($this->conexao, $user->email);
        $user->senha = mysqli_real_escape_string($this->conexao, $user->senha);

        $user->senha = md5($user->senha);
        $query = "SELECT email, senha FROM usuarios WHERE email='{$user->email}' AND senha='{$user->senha}'";
        $resultado = mysqli_query($this->conexao, $query);
        $user = mysqli_fetch_assoc($resultado);
        return $user;
    }
}