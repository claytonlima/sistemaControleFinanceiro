<?php 
session_start();

function verificaUsuarioLogado(){
  if(!usuarioEstaLogado()) {
     $_SESSION["danger"] = "Você não acesso a essa funcionalidade";
     header("Location: index.php");
     die();
  }
}

function usuarioEstaLogado() {
    return isset($_SESSION["email"]);
}

function usuarioLogado() {
    return $_SESSION["email"];
}

function logaUsuario($email) {
    $_SESSION['email'] = $email;  
}

function logout(){
  session_destroy();
  session_start();
}
