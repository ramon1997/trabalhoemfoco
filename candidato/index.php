<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['candidato']) || $_SESSION['candidato'] !== true) {
    // Redireciona para a página de login se não estiver autenticado
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho em foco</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
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
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="#contatos">Contatos</a></li>
                <li><a href="#quemsomos">Quem Somos</a></li>
                <li><a href="perfil.php" class="perfil">Seu Perfil</a></li>

            </ul>
        </nav>
    </div>
    <div class="banner">
        <div class="opaca">
            <h1>"Nenhum de nós é tão inteligente quanto todos nós juntos." - Ken Blanchard</h1>
        </div>
    </div>
    <div class="titulo">
        <h1>Contatos</h1>
    </div>
    <div class="contatos">
        <div class="card">
            <img src="../imagens/email.png">
            <h2>trabalhoemfoco@gmail.com</h2>
        </div>
        <div class="card">
            <img src="../imagens/insta.png">
            <h2>@trabalhoemfoco</h2>
        </div>
        <div class="card">
            <img src="../imagens/zap.png">
            <h2>(75)99999999</h2>
        </div>
    </div>
    <div class="quem">
        <h1>Quem somos</h1>
        <p>"Trabalho em foco o seu parceiro confiável na busca por oportunidades de carreira e
            no recrutamento de talentos. Nossa plataforma foi projetada para simplificar o processo de encontrar
            empregos ou candidatos ideais. Com uma vasta gama de ofertas de emprego e uma base de dados robusta de
            currículos, conectamos candidatos talentosos a empresas de renome em todo o país.

            Para os candidatos, oferecemos uma experiência fácil de usar, com pesquisa intuitiva, notificações
            personalizadas e ferramentas para criar perfis atraentes. Para os empregadores, fornecemos um espaço para
            publicar vagas, analisar currículos e gerenciar o processo de recrutamento de forma eficiente.

            Independentemente de você estar em busca de um novo desafio profissional ou procurando o candidato perfeito
            para sua empresa, Trabalho em foco é o seu destino de escolha. Junte-se a nós e leve sua carreira
            ou seu negócio para o próximo nível."</p>
    </div>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>

</html>