<?php
include_once "../app/model/empresa.php";
include_once "../app/dao/empresadao.php";
include_once "../app/conexao/conexao.php";
$empresa = new empresa();
$empresadao = new empresaDAO();
session_start();
$id = $_SESSION['idEmpresa'];
$dadosdaEmpresa = $empresadao->infoEmpresa($id);
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
                <li><a href="perfilempresa.php" class="perfil">Seu Perfil</a></li>
            </ul>
        </nav>
    </div>
    <div class="tit">
        <h1>Editar seu perfil</h1>
    </div>
    <div class="formulario">
        <form action="../app/controller/empresacontroller.php" method="post">
            <label for="nome">Nome da empresa:</label>
            <input type="text" name="nome" value="<?php echo $dadosdaEmpresa->getNome(); ?>">
            <label for="email">Seu e-mail:</label>
            <input type="email" name="email" value="<?php echo $dadosdaEmpresa->getEmail(); ?>">
            <label for="area">Area de atuação:</label>
            <input type="text" name="area" id="area">
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" placeholder="Cidade onde está sua empresa">
            <label for="xp">Descrição da sua empresa:</label>
            <textarea name="descricao" cols="30" rows="10" desabled></textarea>
            <input type="hidden" name="atualizar">
            <input type="hidden" name="id" value="<?php echo $dadosdaEmpresa->getId(); ?>">
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