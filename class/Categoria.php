<?php

class Categoria{
    public $categoriaId;
    public $nome;

    public function setCategoriaId($categoriaId){
      $this->categoriaId = $categoriaId;
    }

    public function getCategoriaId(){
      return $this->categoriaId;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome;
    }

}