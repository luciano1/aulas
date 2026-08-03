<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $usuarioCorreto = "admin";
    $senhaCorreta = "123456";

    if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {
        $_SESSION["usuario"] = $usuario;
        header("Location: home.php");
        exit;
    } else {
        echo "Usuário ou senha inválidos.";
        echo "<br><br>";
        echo '<a href="login.php">Tentar novamente</a>';
    }
}