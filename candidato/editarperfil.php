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
    <title>Editar seu perfil - Trabalho em foco</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/editarperfil.css">
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
                <li><a href="perfil.php" class="perfil">Seu Perfil</a></li>
            </ul>
        </nav>
    </div>
    <div class="tit">
        <h1>Editar seu perfil</h1>
    </div>
    <div class="formulario">
        <form action="../app/controller/candidatocontroller.php" method="post">
            <label for="nome">Seu nome completo:</label>
            <input type="text" name="nome" value="<?php echo $dadosdocandidato->getNome() ?>">
            <label for="email">Seu e-mail:</label>
            <input type="email" name="email" value="<?php echo $dadosdocandidato->getEmail()?>">
            <label for="cargo">Cargo:</label>
            <input type="text" name="cargo" id="cargo" value="<?php echo $dadosdocandidato->getCargo() ?>">
            <label for="xp">Suas experiencias profissionais:</label>
            <textarea name="xp" cols="30" rows="10" desabled><?php echo $dadosdocandidato->getXp()?></textarea>
            <label for="formacao">Sua formação: (Faculdade e cursos)</label>
            <textarea name="formacao" cols="30" rows="10"><?php echo $dadosdocandidato->getFormacao() ?></textarea>
            <label for="habilidades">Suas habilidades: </label>
            <textarea name="habilidades" cols="30" rows="10"><?php echo $dadosdocandidato->getHabilidades()?></textarea>
            <input type="hidden" name="atualizar">
            <input type="hidden" name="id" value="<?php echo $dadosdocandidato->getId(); ?>">
            <input type="submit" value="Editar" id="botao">
        </form>
    </div>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>
</html>