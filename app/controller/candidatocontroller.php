<?php
include_once "../conexao/conexao.php";
include_once "../model/candidato.php";
include_once "../model/empresa.php";
include_once "../dao/candidatodao.php";
include_once "../dao/empresadao.php";

$candidato = new candidato();
$candidatodao = new candidatoDAO();

$empresa = new empresa();
$empresadao = new empresaDAO();

$d = filter_input_array(INPUT_POST);

if (isset($_POST['cadastrar'])) {
    $candidato->setNome($d['nome']);
    $candidato->setEmail($d['email']);

    $senhaHash = password_hash($d['senha'], PASSWORD_DEFAULT);
    $candidato->setSenha($senhaHash);

    $candidatodao->cadastrar($candidato);

    header("Location: ../../index.php");
    exit();
} elseif (isset($_GET['sair'])) {
    session_start();
    session_destroy();
    header("Location: ../../index.php");
    exit();
} elseif (isset($_POST['atualizar'])) {
    $candidato->setId($d['id']);
    $candidato->setNome($d['nome']);
    $candidato->setEmail($d['email']);
    $candidato->setXp($d['xp']);
    $candidato->setFormacao($d['formacao']);
    $candidato->setHabilidades($d['habilidades']);
    $candidato->setCargo($d['cargo']);

    $candidatodao->atualizar($candidato);

    header("Location: ../../candidato/perfil.php");
} elseif (isset($_GET['candidatarse'])) {
    $id_vaga = $_GET['id_vaga'];
    $id_candidato = $_GET['id_candidato'];

    $candidatodao->candidatarse($id_vaga, $id_candidato);

    header("Location: ../../candidato/vagas.php");
}
