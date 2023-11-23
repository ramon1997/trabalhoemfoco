<?php
class empresa{
    private $id;
    private $nome;
    private $empresaemail;
    private $empresasenha;

    function getId(){
        return $this->id;
    }

    function getNome(){
        return $this->nome;
    }

    function getEmail(){
        return $this->empresaemail;
    }

    function getSenha(){
        return $this->empresasenha;
    }

    function setId($id){
        $this->id = $id;
    }


    function setNome($nome){
        $this->nome = $nome;
    }


    function setEmail($empresaemail){
        $this->empresaemail = $empresaemail;
    }


    function setSenha($empresasenha){
        $this->empresasenha = $empresasenha;
    }
}