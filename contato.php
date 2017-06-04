<?php
require_once("cabecalho.php");
?>

<h2>Formulário de email</h2>
    <form action="envia-email.php" method="post">
        <table class="table">
            <tr>
                <td>Nome:</td>
                <td><input class="form-control" type="text" name="nome"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="form-control" type="email" name="email"></td>
            </tr>
            <tr>
                <td>Mensagem:</td>
                <td><textarea class="form-control" name="mensagem"/></textarea></td>
            </tr>
        </table>
        <tr>
            <td><button class="btn btn-primary" type="submit">Enviar</button></td>
        </tr>
    </form>

<?php require_once("rodape.php"); ?>
 



