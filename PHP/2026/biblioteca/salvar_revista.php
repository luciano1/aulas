<?php

// Protege a página e cria a conexão com o banco de dados.
require_once "proteger.php";
require_once "conexao.php";

// O cadastro só será executado quando o formulário usar POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os valores enviados pelo formulário.
    // O operador ?? usa um valor vazio caso o campo não exista.
    $titulo = trim($_POST["titulo"] ?? "");
    $editora = trim($_POST["editora"] ?? "");
    $ano = $_POST["ano"] ?? "";
    $quantidade = $_POST["quantidade"] ?? "";

    // Faz uma validação simples antes de salvar no banco.
    $dadosValidos =
        !empty($titulo) &&
        !empty($editora) &&
        is_numeric($ano) &&
        $ano <= date("Y") &&
        is_numeric($quantidade) &&
        $quantidade >= 0;

    if ($dadosValidos) {

        // Os parâmetros evitam colocar os valores diretamente no SQL.
        $sql = "INSERT INTO revistas
                (titulo, editora, ano, quantidade)
                VALUES
                (:titulo, :editora, :ano, :quantidade)";

        // Prepara e executa o cadastro da revista.
        $comando = $pdo->prepare($sql);

        $comando->execute([
            ":titulo" => $titulo,
            ":editora" => $editora,
            ":ano" => $ano,
            ":quantidade" => $quantidade
        ]);

        echo "Revista cadastrada com sucesso!";

    } else {

        echo "Dados da revista inválidos.";
    }
}

?>

<br><br>

<a href="cadastro_revista.php">Cadastrar outra revista</a>

<br><br>

<a href="home.php">Voltar para o início</a>
