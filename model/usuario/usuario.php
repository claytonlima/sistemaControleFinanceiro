<?php
require_once("config/database/conexao.php");

function listaUsuarios($conexao)
{
    $usuarios = [];
    $resultado = mysqli_query($conexao,"SELECT * FROM usuarios");
    while($usuario_array = mysqli_fetch_assoc($resultado))
    {
       $user = new Usuario();
       $user->usuarioId = $usuario_array["usuario_id"];
       $user->nome      = $usuario_array["nome"];

       array_push($usuarios, $user);
    }
    
    return $usuarios;
}

function buscaUsuario($conexao, Usuario $user){
    $user->email = mysqli_real_escape_string($conexao, $user->email);
    $user->senha = mysqli_real_escape_string($conexao, $user->senha);
    
    $user->senha = md5($user->senha);
    $query = "SELECT email, senha FROM usuarios WHERE email='{$user->email}' AND senha='{$user->senha}'";
    $resultado = mysqli_query($conexao, $query);
    $user = mysqli_fetch_assoc($resultado);
    return $user;
}    

