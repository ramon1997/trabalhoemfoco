<?php
// Obtenha o idEmpresa da sessão
session_start();
$idEmpresa = $_SESSION['idEmpresa'];

include_once "../app/conexao/conexao.php";
include_once "../app/model/empresa.php";
include_once "../app/dao/empresadao.php";

$vagas = new vagas;
$vagasdao = new VagasDAO;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas vagas - Trabalho em Foco</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/estilo-vagas.css">
    <link rel="shortcut icon" href="../imagens/tools.png" type="image/x-icon">
    <style>
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 1;
            background-color: #141414;
            border-radius: 20px;
            border: solid 2px #cc0002;
        }

        #modal input{
            background-color: #141414;
            border:#cc0002 solid 1px;
            border-radius: 20px;
            color: #fff;
            height: 30px;
        }

        #modal textarea{
            background-color: #141414;
            border:#cc0002 solid 1px;
            border-radius: 20px;
            resize: none;
            color: #fff;
        }

        #modal button{
            background-color: #141414;
            color: #fff;
            border: #cc0002 1px solid;
            width: 100px;
            height: 30px;
            border-radius: 20px;
        }

        #modal label{
            display: flex;
            flex-direction: column;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
    </style>
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
        <h1>Minhas vagas &curvearrowright;</h1>
    </div>
    <?php foreach ($vagasdao->minhasVagas($idEmpresa) as $vaga) { ?>
        <div class="vaga">
            <h1><?php echo $vaga->getTitulo(); ?></h1>
            <p><?php echo $vaga->getDescricao(); ?></p>
            <button><a href="../app/controller/empresacontroller.php?apagarvaga&id=<?php echo $vaga->getId() ?>">Apagar vaga</a></button>
            <button onclick="openModal()">Atualizar</button>
            <button><a href="candidatos.php?idVaga=<?php echo $vaga->getId() ?>" target="_blank" rel="noopener noreferrer">Candidatos</a></button>
        </div>
    <?php } ?>
    </div>
    <div id="overlay"></div>

    <div id="modal">
        <span onclick="closeModal()"></span>
        <h2>Atualizar Informações da vaga</h2>
        <form action="../app/controller/empresacontroller.php" method="post" id="updateForm">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required value="<?php echo $vaga->getTitulo(); ?>">
            <br>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required><?php echo $vaga->getDescricao(); ?></textarea>
            <input type="hidden" name="atualizarvaga">
            <input type="hidden" name="id" value="<?php echo $vaga->getId()?>">
            <br>
            <input type="submit" value="Atualizar">
            <button type="button" onclick="closeModal()">Cancelar</button>
        </form>
    </div>

<script>
    function openModal() {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>
    <footer>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</footer>
    <script src="../javascript/js.js"></script>
    <script src="../javascript/letrasquesomem.js"></script>
</body>

</html>