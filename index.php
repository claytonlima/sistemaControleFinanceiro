<?php include("cabecalho.php"); ?>
<?php include ("functions/usuario/logica-usuario.php"); ?>

<?php if(usuarioEstaLogado()): ?>
    <p class="text-success">Você está logado(a) como <?php echo usuarioLogado(); ?></p><a href="logout.php">Deslogar</a></p>
<?php else: ?>
<center><h1>Bem vindo</h1></center>
<center><h3>Login</h3></center>
<form action="login.php" method="post">
    <table class="table">
        <tr>
            <td>Email:</td>
            <td><input class="form-control" type="email" name="email"/>
        </tr>
        <tr>
            <td>Senha:</td>
            <td><input class="form-control" type="text" name="password"/>
        </tr>
        <tr>
            <td><button class="btn btn-success" type="submit">Logar</button>
        </tr>
    </table>

</form>
<?php endif ?>

<?php include("rodape.php"); ?>