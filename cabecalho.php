<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  require_once("functions/alerta/alert-mensage.php");
  
  function carregaClasse($nomeDaClasse)
  {
      require_once("class/" . $nomeDaClasse . ".php");
  }

  spl_autoload_register("carregaClasse");

  ?>

<html>
<head>
    <title>Controle Financero</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/index.php">Sistema Financeiro</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Conta<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./conta-formulario.php">Adicionar conta</a></li>
          <li><a href="./conta-lista.php">Listar contas</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/valor-gasto.php">Valores do mês</a></li>
        </ul>   
      </li>
       <li class="dropdown"><a href="./contato.php">Contato</a></li>
    </ul>
  </div>
</nav>
<?php
  mostraAlerta("success");
  mostraAlerta("danger");
?>
    <div class="container">

        <div class="principal">
    <!-- fim cabecalho.php -->