<?php

// Protege a página e abre conexão com o banco.
require_once "../includes/proteger.php";
require_once "../config/conexao.php";

// Busca todos os livros ordenados pelo título.
$sql = "SELECT * FROM livros ORDER BY titulo";
$comando = $pdo->query($sql);
$livros = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Livros</title>
</head>

<body>
    <h1>Livros cadastrados</h1>

    <a href="cadastrar.php">Cadastrar novo livro</a>
    <br><br>

    <?php if (empty($livros)) { ?>

        <p>Nenhum livro cadastrado.</p>

    <?php } else { ?>

        <!-- A tabela mostra os registros retornados do banco. -->
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Quantidade</th>
                    <th>Ano</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro) { ?>
                    <tr>
                        <td><?= htmlspecialchars($livro["id"]) ?></td>
                        <td><?= htmlspecialchars($livro["titulo"]) ?></td>
                        <td><?= htmlspecialchars($livro["autor"]) ?></td>
                        <td><?= htmlspecialchars($livro["quantidade"]) ?></td>
                        <td><?= htmlspecialchars($livro["ano"]) ?></td>
                        <td><?= htmlspecialchars($livro["categoria"]) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $livro["id"] ?>">Editar</a>
                            |
                            <a href="excluir.php?id=<?= $livro["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>

    <br>

    <a href="../home.php">Voltar</a>
</body>

</html>
