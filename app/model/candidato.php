<?php
class candidato{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $xp;
    private $formacao;
    private $habilidades;
    private $cargo;

    function getId(){
        return $this->id;
    }

    function getNome(){
        return $this->nome;
    }

    function getEmail(){
        return $this->email;
    }

    function getSenha(){
        return $this->senha;
    }

    function getXp(){
        return $this->xp;
    }

    function getFormacao(){
        return $this->formacao;
    }

    function getHabilidades(){
        return $this->habilidades;
    }

    function getCargo(){
        return $this->cargo;
    }

    function setId($id){
        $this->id = $id;
    }


    function setNome($nome){
        $this->nome = $nome;
    }


    function setEmail($email){
        $this->email = $email;
    }


    function setSenha($senha){
        $this->senha = $senha;
    }

    function setXp($xp){
        $this->xp = $xp;
    }

    function setFormacao($formacao){
        $this->formacao = $formacao;
    }

    function setHabilidades($habilidades){
        $this->habilidades = $habilidades;
    }

    function setCargo($cargo){
        $this->cargo = $cargo;
    }
}