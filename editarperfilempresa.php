<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar seu perfil - Trabalho em foco</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/editarperfil.css">
    <link rel="shortcut icon" href="imagens/tools.png" type="image/x-icon">
</head>
<body>
    <div class="barra">
        <div class="logo">
            <img src="imagens/tools.png">
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
        <form action="" method="post">
            <label for="nome">Nome da empresa:</label>
            <input type="text" name="nome" placeholder="Nome completo">
            <label for="telefone">Numero de celular:</label>
            <input type="number" name="telefone" placeholder="Seu numero com DDD">
            <label for="email">Seu e-mail:</label>
            <input type="email" name="email" placeholder="Um e-mail valido">
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" placeholder="Cidade onde está sua empresa">
            <label for="xp">Descrição da sua empresa:</label>
            <textarea name="xp" cols="30" rows="10" desabled></textarea>
            <input type="submit" value="Editar" id="botao">
        </form>
    </div>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="javascript/js.js"></script>
    <script src="javascript/letrasquesomem.js"></script>
</body>
</html>