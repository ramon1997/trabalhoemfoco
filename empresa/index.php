<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['empresa']) || $_SESSION['empresa'] !== true) {
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
    <title>funcionou</title>
</head>
<body>
    <h1>funcionou</h1>
</body>
</html>