<?php

// Protege a página e abre conexão com o banco.
require_once "proteger.php";
require_once "conexao.php";

// Busca todas as revistas ordenadas pelo título.
$sql = "SELECT * FROM revistas ORDER BY titulo";
$comando = $pdo->query($sql);
$revistas = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Revistas</title>
</head>

<body>
    <h1>Revistas cadastradas</h1>

    <a href="cadastro_revista.php">Cadastrar nova revista</a>
    <br><br>

    <?php if (empty($revistas)) { ?>

        <p>Nenhuma revista cadastrada.</p>

    <?php } else { ?>

        <!-- A tabela mostra os registros retornados do banco. -->
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Editora</th>
                    <th>Ano</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($revistas as $revista) { ?>
                    <tr>
                        <td><?= htmlspecialchars($revista["id"]) ?></td>
                        <td><?= htmlspecialchars($revista["titulo"]) ?></td>
                        <td><?= htmlspecialchars($revista["editora"]) ?></td>
                        <td><?= htmlspecialchars($revista["ano"]) ?></td>
                        <td><?= htmlspecialchars($revista["quantidade"]) ?></td>
                        <td>
                            <a href="editar_revista.php?id=<?= $revista["id"] ?>">Editar</a>
                            |
                            <a href="excluir_revista.php?id=<?= $revista["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>

    <br>

    <a href="home.php">Voltar</a>
</body>

</html>
