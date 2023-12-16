<?php
include_once "../app/conexao/conexao.php";
include_once "../app/model/empresa.php";
include_once "../app/dao/empresadao.php";

$vagas = new vagas;
$vagasdao = new VagasDAO;

$busca = $_POST['buscarvagas'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar - Trabalho em Foco</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/estilo-vagas.css">
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
                <li><a href="#contato">Contatos</a></li>
                <li><a href="#quemsomos">Quem Somos</a></li>
                <li><a href="perfil.php" class="perfil">Seu Perfil</a></li>
            </ul>
        </nav>
    </div>
    <div class="titulo">
        <h1>Resultado da busca &curvearrowright;</h1>
    </div>
    <?php
    $resultados = $vagasdao->buscarVagas($busca);
    if (empty($resultados)) {
        echo "<h1>Nenhum resultado</h1>";
    } ?>
    <?php foreach ($vagasdao->buscarVagas($busca) as $vaga) { ?>
        <div class="vaga">
            <h1><?php echo $vaga->getTitulo(); ?></h1>
            <p><?php echo $vaga->getDescricao(); ?></p>
            <button><a href="vaga.php?id=<?php echo $vaga->getId() ?>" target="_blank" rel="noopener noreferrer">Veja mais</a></button>
        </div>
    <?php } ?>
    </div>
    <footer>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>

</html>