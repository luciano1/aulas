<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "meu_banco"
);

// Salvar alteração
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios
            SET
                nome = '$nome',
                email = '$email'
            WHERE id = $id";

    $conn->query($sql);

    header("Location: index.php");
    exit;
}


// Buscar usuário
$id = $_GET["id"];

$sql = "SELECT * FROM usuarios
        WHERE id = $id";

$resultado = $conn->query($sql);

$usuario = $resultado->fetch_assoc();

?>

<h2>Editar usuário</h2>

<form method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $usuario["id"] ?>"
    >

    Nome:

    <input
        type="text"
        name="nome"
        value="<?= $usuario["nome"] ?>"
    >

    <br><br>

    Email:

    <input
        type="email"
        name="email"
        value="<?= $usuario["email"] ?>"
    >

    <br><br>

    <button type="submit">
        Salvar
    </button>

</form>