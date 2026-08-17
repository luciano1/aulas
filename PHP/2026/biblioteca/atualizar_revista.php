<?php

// Protege a página e carrega conexão e validações.
require_once "proteger.php";
require_once "conexao.php";
require_once "funcoes.php";

// Atualização só deve acontecer por POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe o ID e os campos enviados pelo formulário.
    $id = $_POST["id"] ?? "";
    $titulo = trim($_POST["titulo"] ?? "");
    $editora = trim($_POST["editora"] ?? "");
    $ano = $_POST["ano"] ?? "";
    $quantidade = $_POST["quantidade"] ?? "";

    // Verifica se o ID e os campos possuem valores válidos.
    $dadosValidos =
        is_numeric($id) &&
        validarRevista($titulo, $editora, $ano, $quantidade);

    if ($dadosValidos) {

        // Atualiza o registro que possui o ID recebido.
        $sql = "UPDATE revistas
                SET titulo = :titulo,
                    editora = :editora,
                    ano = :ano,
                    quantidade = :quantidade
                WHERE id = :id";

        $comando = $pdo->prepare($sql);

        $comando->execute([
            ":titulo" => $titulo,
            ":editora" => $editora,
            ":ano" => $ano,
            ":quantidade" => $quantidade,
            ":id" => $id
        ]);

        echo "Revista atualizada com sucesso!";

    } else {

        echo "Dados da revista inválidos.";
    }
}

?>

<br><br>

<a href="revistas.php">Voltar para revistas</a>
