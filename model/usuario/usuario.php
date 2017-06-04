<?php
require_once("config/database/conexao.php");

function listaUsuarios($conexao)
{
    $usuarios = [];
    $resultado = mysqli_query($conexao,"SELECT * FROM usuarios");
    while($usuario = mysqli_fetch_assoc($resultado))
    {
       array_push($usuarios, $usuario);
    }
    return $usuarios;
}

function buscaUsuario($conexao, $email, $senha){
    $md5Convert = md5($senha);
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "SELECT email, senha FROM usuarios WHERE email='{$email}' AND senha='{$md5Convert}'";
    $resultado = mysqli_query($conexao, $query);
    $user = mysqli_fetch_assoc($resultado);
    return $user;
}    

