<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Página inicial</title>
</head>

<body>
    <h1>Sistema de Biblioteca</h1>
    <p> Bem-vindo, <?= $_SESSION["usuario"] ?> </p> 
    <a href="cadastro_livro.php"> Cadastrar livro </a> <br><br> <a
        href="logout.php"> Sair </a>
</body>

</html>