<?php
include_once "app/conexao/conexao.php";

$emailcandidato = $_POST['email'];
$senhaDigitadadocandidato = $_POST['senha'];

$emailempresa = $_POST['email'];
$senhaDigitadadaempresa = $_POST['senha'];

$candidato = conexao::getConexao()->prepare("SELECT senha FROM testecandi WHERE email = :email");
$candidato->bindParam(':email', $emailcandidato);
$candidato->execute();
$resultadocandidato = $candidato->fetch();

$empresa = conexao::getConexao()->prepare("SELECT senha FROM testeempre WHERE email = :email");
$empresa->bindParam(':email', $emailempresa);
$empresa->execute();
$resultadoempresa = $empresa->fetch();

if ($resultadocandidato && password_verify($senhaDigitadadocandidato, $resultadocandidato['senha'])) {
    header("Location: candidato");
    exit();
}

if ($resultadoempresa && password_verify($senhaDigitadadaempresa, $resultadoempresa['senha'])) {
    header("Location: empresa");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho em foco</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="shortcut icon" href="imagens/tools.png" type="image/x-icon">
</head>

<body>
    <div class="quasemenu">
        <div id="texto"></div>
    </div>
    <div class="titulo">
        <h1>Login</h1>
    </div>
    <div class="container">
        <div class="texto">
            <h1>Bem-vindo de volta</h1>
            <h2>"A jornada de mil milhas começa com um único passo." - Lao Tsé</h2>
            <hr>
            <h3>Não tem uma conta? clique no botão abaixo</h3>
            <nav>
                <a href="redi.html">Crie uma conta</a>
            </nav>
        </div>
        <div class="entrar">
            <h3>Preencha os campos abaixo</h3>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="email">E-mail:</label>
                <input type="email" name="email" placeholder="Seu e-mail">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" placeholder="Sua senha">
                <input type="hidden" name="login">
                <input type="submit" value="Entrar" id="botao">
            </form>
        </div>
    </div>
    <footer>
        <p>Copyright © 2023 Antony Dias & Ramon Santana. All right reserved</p>
    </footer>
    <script src="javascript/letrasquesomem.js"></script>
</body>

</html>