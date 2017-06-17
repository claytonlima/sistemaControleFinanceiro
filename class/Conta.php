<?php

class Conta{
    Private $contaId;
    Private $nome;
    Private $preco;
    Private $dataCompra;
    Private $descricao;
    public  $categoria;
    public  $usuario;

    public function __construct($nome, $preco, $dataCompra, $descricao, Categoria $categoria, Usuario $usuario){
        $this->nome = $nome;
        $this->preco = (double)$preco;
        $this->dataCompra = $dataCompra;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usuario = $usuario;
    }
    
    public function setContaId($contaId){
        $this->contaId = $contaId;
    }

    public function getContaId(){
        return $this->contaId;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDataCompra($dataCompra){
        $this->dataCompra = $dataCompra;
    }

    public function getDataCompra(){
        return $this->dataCompra;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    function __toString()
    {
        return "Id, ".$this->contaId." Nome, ".$this->nome.", Preco ,".$this->preco."Descrição, ".$this->descricao.", Categoria".$this->categoria." Usuario".$this->usuario;
    }

}