<?php
// Obtenha o idEmpresa da sessão
session_start();
$idEmpresa = $_SESSION['idEmpresa'];

include_once "../conexao/conexao.php";
include_once "../model/candidato.php";
include_once "../model/empresa.php";
include_once "../dao/candidatodao.php";
include_once "../dao/empresadao.php";

$candidato = new candidato();
$candidatodao = new candidatoDAO();

$empresa = new empresa();
$empresadao = new empresaDAO();

$vagas = new vagas();
$vagasdao = new VagasDAO();

$d = filter_input_array(INPUT_POST);

if (isset($_POST['cadastrar'])) {
    $empresa->setNome($d['nome']);
    $empresa->setEmail($d['email']);
    $empresa->setCidade($d['cidade']);

    $senhaHash = password_hash($d['senha'], PASSWORD_DEFAULT);
    $empresa->setSenha($senhaHash);

    $empresadao->cadastrar($empresa);

    header("Location: ../../index.php");
    exit();
} elseif (isset($_GET['sair'])) {
    session_start();
    session_destroy();
    header("Location: ../../index.php");
    exit();
} elseif (isset($_POST['criar'])) {
    $vagas->setTitulo($d['titulo']);
    $vagas->setDescricao($d['descricao']);
    $vagas->setNomedaempresa($d['nomedaempresa']);
    $vagas->setDescricaodaempresa($d['descricaodaempresa']);

    $vagasdao->criarVaga($vagas, $idEmpresa);
    header("Location: ../../empresa");
} elseif (isset($_POST['atualizar'])) {
    $empresa->setId($d['id']);
    $empresa->setNome($d['nome']);
    $empresa->setEmail($d['email']);
    $empresa->setArea($d['area']);
    $empresa->setCidade($d['cidade']);
    $empresa->setDescricao($d['descricao']);

    $empresadao->atualizar($empresa);

    header("Location: ../../empresa/perfilempresa.php");
} elseif (isset($_GET['apagarvaga'])) {
    $vagas->setId($_GET['id']);
    $vagasdao->apagarVaga($vagas, $idEmpresa);

    header("Location: ../../empresa/minhasvagas.php");
} elseif (isset($_POST['atualizarvaga'])) {
    $vagas->setId($d['id']);
    $vagas->setTitulo($d['titulo']);
    $vagas->setDescricao($d['descricao']);

    $vagasdao->atualizarVaga($vagas, $idEmpresa);

    header("Location: ../../empresa/minhasvagas.php");
}
