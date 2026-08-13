<?php
$conn = new mysqli(
    '127.0.0.1',
    'root',
    '',
    'meu_banco'
);

$sql = 'SELECT id, nome, email, senha
        FROM usuarios';

$resultado = $conn->query($sql);

?>

<h2>Usuários</h2>

<a href="cadastro.php">
    Cadastrar usuário
</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
<?php foreach ($resultado as $usuario) { ?>
        <tr>
            <td>
                <?= $usuario['id'] ?>
            </td>
            <td>
                <?= $usuario['nome'] ?>
            </td>
            <td>
                <?= $usuario['email'] ?>
            </td>
            <td>
                <a href="editar.php?id=<?= $usuario['id'] ?>">
                    Editar
                </a>
                <a href="delete.php?id=<?= $usuario['id'] ?>">
                    Excluir
                </a>
            </td>

        </tr>

<?php } ?>