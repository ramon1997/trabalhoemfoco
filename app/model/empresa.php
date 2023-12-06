<?php
class empresa{
    private $id;
    private $nome;
    private $empresaemail;
    private $empresasenha;
    private $area;
    private $descricao;
    private $cidade;

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

    function getArea(){
        return $this->area;
    }

    function getDescricao(){
        return $this->descricao;
    }

    function getCidade(){
        return $this->cidade;
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

    function setArea($area){
        $this->area = $area;
    }

    function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    function setCidade($cidade){
        $this->cidade = $cidade;
    }
}

//model das vagas, preguiça de criar novos arquivos pra pouca coisa

class vagas{
    private $id;
    private $titulo;
    private $descricao;
    private $nomedaempresa;
    private $descricaodaempresa;

    function getId(){
        return $this->id;
    }

    function getTitulo(){
        return $this->titulo;
    }

    function getDescricao(){
        return $this->descricao;
    }

    function getNomedaempresa(){
        return $this->nomedaempresa;
    }

    function getDescricaodaempresa(){
        return $this->descricaodaempresa;
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

    function setNomedaempresa($nomedaempresa){
        $this->nomedaempresa = $nomedaempresa;
    }

    function setDescricaodaempresa($descricaodaempresa){
        $this->descricaodaempresa = $descricaodaempresa;
    }
}