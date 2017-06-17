<?php require_once("cabecalho.php"); ?>
<?php require_once("functions/usuario/logica-usuario.php"); ?>
<?php require_once("class/Usuario.php"); ?>

<?php
$user = new Usuario();

$user->email = $_POST['email'];
$user->senha = $_POST['password'];

$usuarioDao = new UsuarioDao();
$user = $usuarioDao->buscaUsuario($user);

if($user != null){
    $_SESSION["success"] = "Usuario logado com sucesso";
    logaUsuario($user['email']);
    header("Location: index.php");
}else{
    $_SESSION["danger"] = "Não foi possivel efetuar seu Login, verifique email ou senha";
    header("Location: index.php");
}
die();

?>