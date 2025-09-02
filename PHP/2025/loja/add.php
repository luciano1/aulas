<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Novo produto</h2>
    <form action="salvar_produtos.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="number" name="preco" step="0.01" placeholder="Preço">
        <input type="number" name="estoque" placeholder="Estoque">
        <button>Cadastrar</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>
</html>