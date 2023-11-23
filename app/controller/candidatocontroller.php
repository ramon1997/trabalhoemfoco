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