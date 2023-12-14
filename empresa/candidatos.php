<?php
include_once "../app/conexao/conexao.php";
include_once "../app/model/candidato.php";
include_once "../app/dao/empresadao.php";

$candidato = new candidato;
$vagasdao = new VagasDAO;

session_start();
$idEmpresa = $_SESSION['idEmpresa'];

$idVaga = $_GET['idVaga'];

$dadosDoscanditados = $vagasdao->candidatosDavaga($idvaga, $idEmpresa);

if ($dadosDoscanditados !== false) {
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- trabalho em foco</title>
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
                <li><a href="vagas.php">Vagas</a></li>
                <li><a href="#contato">Contatos</a></li>
                <li><a href="#quemsomos">Quem Somos</a></li>
                <li><a href="perfil.php" class="perfil">Seu Perfil</a></li>
            </ul>
        </nav>
    </div>
    <div class="titulo">
        <h1>Candidatos &curvearrowright;</h1>
    </div>
    <?php foreach ($vagasdao->candidatosDavaga($idVaga,$idEmpresa) as $candidato) { ?>
        <div class="vaga">
            <h1><?php echo $candidato->getNome(); ?></h1>
            <p><?php echo $candidato->getEmail(); ?></p>
            <button><a href="vaga.php?id=<?php echo $candidato->getId()?>" target="_blank" rel="noopener noreferrer">Veja mais</a></button>
        </div>
    <?php } ?>
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