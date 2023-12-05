<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar vagas - Trabalho em foco</title>
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
        <h1>Criar vagas</h1>
    </div>
    <div class="formulario">
        <form action="../app/controller/empresacontroller.php" method="post">
            <label for="titulo">Titulo da vaga:</label>
            <input type="text" name="titulo" placeholder="Ex:secretaria">
            <label for="xp">Descrição da sua vaga:</label>
            <textarea name="descricao" cols="30" rows="10" desabled></textarea>
            <input type="hidden" name="criar">
            <input type="submit" value="Criar" id="botao">
        </form>
    </div>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>
</html>