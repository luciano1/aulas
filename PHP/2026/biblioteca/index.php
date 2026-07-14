<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h2>Cadastrar Novo Livro</h2>
    <!-- O action define para onde enviar; o method define o envio via URL -->
    <form action="salvar.php" method="GET">
        <label>Título:</label><br>
        <input type="text" name="campo-titulo" required><br><br>

        <label>Autor:</label><br>
        <input type="text" name="campo-autor" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="campo-quantidade" value="0" required><br><br>

        <label>Ano de Publicação:</label><br>
        <input type="number" name="campo-ano" value="2026" required><br><br>

        <label>Categoria:</label><br>
        <select name="campo-categoria" required>
            <option value="Tecnologia">Tecnologia</option>
            <option value="História">História</option>
            <option value="Romance">Romance</option>
            <option value="Didático">Didático</option>
        </select><br><br>

        <button type="submit">Cadastrar Livro</button>
    </form>
</body>
</html>
