<?php

class Conta{
    Private $contaId;
    Private $nome;
    Private $preco;
    Private $dataCompra;
    Private $descricao;
    public  $categoria;
    public  $usuario;
    
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
        $this->donoConta = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }
  
}