<?php 

$conexao = mysqli_connect('localhost', 'root', '123brasil123', 'loja');
if(!$conexao){
    $conexao = mysqli_connect('localhost', 'root', '850702', 'loja');
}
