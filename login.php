<?php require_once("model/usuario/usuario.php"); ?>
<?php require_once("functions/usuario/logica-usuario.php"); ?>

<?php
$email = $_POST['email'];
$senha = $_POST['password'];

$user = buscaUsuario($conexao, $email, $senha);

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