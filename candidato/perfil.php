<?php
include_once "../app/model/candidato.php";
include_once "../app/dao/candidatodao.php";
include_once "../app/conexao/conexao.php";
$candidato = new candidato();
$candidatodao = new candidatoDAO();
session_start();
$id = $_SESSION['idCandidato'];
$dadosdocandidato = $candidatodao->infoCandidato($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Perfil - Trabalho em Foco</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="shortcut icon" href="../imagens/tools.png" type="image/x-icon">
</head>
<body>
    <div class="barra">
        <div class="logo">
            <img src="../imagens/tools.png">
            <div id="texto"></div>
        </div>
        <nav class="barra">
            <div class="mobile">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="#contatos">Contatos</a></li>
                <li><a href="#quemsomos">Quem Somos</a></li>
                <li><a href="editarperfil.php" class="perfil">Editar seu perfil</a></li>
            </ul>
        </nav>
    </div>
    <div class="banner">
        <img src="../imagens/arvore.jpg">
    </div>
    <div class="foto">
        <img src="../imagens/avatar.png">
    </div>
    <div class="informacoes">
        <h2><?php echo $dadosdocandidato->getNome(); ?></h2>
        <h3><?php echo $dadosdocandidato->getEmail(); ?></h3>
        <h3><?php echo $dadosdocandidato->getCargo(); ?></h3>
        <h3><?php echo $dadosdocandidato->getXp(); ?></h3>
        <h3><?php echo $dadosdocandidato->getHabilidades(); ?></h3>
        <h3><?php echo $dadosdocandidato->getFormacao(); ?></h3>
    </div>
    <a href="../app/controller/candidatocontroller.php?sair">Sair</a>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>
</html>