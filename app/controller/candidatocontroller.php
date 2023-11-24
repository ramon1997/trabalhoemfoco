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
}
?>
