<?php

class Usuario{
    public $usuarioId;
    public $nome;
    public $email;
    public $senha;

    public function setUsuarioId($usuarioId){
      $this->usuarioId = $usuarioId;
    } 

    public function getUsuarioId(){
      return $this->usuarioId;
    }

    public function setNome($nome){
      $this->nome = $nome;
    }

    public function getNome(){
      return $this->nome;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setSenha(){
      $this->senha = $senha;
    }

    public function getSenha(){
      return $this->senha;
    }


  }