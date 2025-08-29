<?php
require "db.php";
$id = $_GET["id"];
$stmt = $pdo->prepare("Select * from produtos where id= ?");
$stmt->execute([$id]);

$linha_resultado = $stmt->fetch();
if (!$linha_resultado) {
    die("PRODUTO NÃO ENCONTRADO!");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Editar produto</h2>
    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?= $linha_resultado['id'] ?>">
        Nome:<br>
        <input type="text" name="nome" value="<?= htmlspecialchars($linha_resultado['nome']) ?>"><br><br>

        Preço:<br>
        <input type="number" step="0.01" name="preco" value="<?= $linha_resultado['preco'] ?>"><br><br>

        Estoque:<br>
        <input type="number" name="estoque" value="<?= $linha_resultado['estoque'] ?>"><br><br>

        <button>Salvar</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>

</html>