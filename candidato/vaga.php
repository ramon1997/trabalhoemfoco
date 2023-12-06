<?php
include_once "../app/conexao/conexao.php";
include_once "../app/model/empresa.php";
include_once "../app/dao/empresadao.php";

$vagas = new vagas;
$vagasdao = new VagasDAO;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    header("Location: vagas.php");
    exit();
}

$dadosDaVaga = $vagasdao->infoVaga($id);

if ($dadosDaVaga !== false) {
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dadosDaVaga->getTitulo(); ?> - trabalho em foco</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/vaga.css">
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
                <li><a href="#contato">Contatos</a></li>
                <li><a href="#quemsomos">Quem Somos</a></li>
                <li><a href="perfil.php" class="perfil">Seu Perfil</a></li>
            </ul>
        </nav>
    </div>
        <div class="titulo">
            <h1><?php echo $dadosDaVaga->getTitulo(); ?></h1>
        </div>
        <div class="empresa">
            <h2><?php echo $dadosDaVaga->getNomedaempresa();?></h2>
            <p><?php echo $dadosDaVaga->getDescricaodaempresa();?> </p>
        </div>
        <div class="descvaga">
            <h2>descrição da vaga</h2>
            <p><?php echo $dadosDaVaga->getDescricao(); ?></p>
        </div>
    <h2 id="deixe">Vagas Parecidas &curvearrowright;</h2>
    <div class="relacionados">
        <div class="card">
            <h2>titulo da vaga</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi corrupti fugiat recusandae, earum reiciendis vel corporis quod sequi dicta nostrum ipsum eius nisi atque placeat tempora repellat. Quasi, omnis similique!</p>
            <button>veja mais</button>
        </div>
        <div class="card"></div>
        <div class="card"></div>
    </div>
    <footer>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>

</html>
<?php
} else {
    echo "Vaga não encontrada ou erro na consulta.";
}
?>