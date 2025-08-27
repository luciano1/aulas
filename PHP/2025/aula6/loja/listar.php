<?php
require "db.php";

$resultado = $pdo->query("SELECT * FROM produtos");

echo '<p><a href="add.php">+ Novo produto</a></p>';

echo "<h2>Lista de Produtos</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Nome</th><th>Preço</th><th>Estoque</th><th>Ações</th></tr>";

foreach ($resultado as $linha) {
    echo "<tr>";
    echo "<td>{$linha['id']}</td>";
    echo "<td>{$linha['nome']}</td>";
    echo "<td>{$linha['preco']}</td>";
    echo "<td>{$linha['estoque']}</td>";
    echo "<td><a href='editar.php?id={$linha['id']}'>Editar</a></td>";
    echo "</tr>";
}

echo "</table>";
?>