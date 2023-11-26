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

//model das vagas, preguiça de criar novos arquivos pra pouca coisa

class vagas{
    private $id;
    private $titulo;
    private $descricao;

    function getId(){
        return $this->id;
    }

    function getTitulo(){
        return $this->titulo;
    }

    function getDescricao(){
        return $this->descricao;
    }

    function setId($id){
        $this->id = $id;
    }

    function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    function setDescricao($descricao){
        $this->descricao = $descricao;
    }
}