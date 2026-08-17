<?php

// Inicia a sessão para guardar o usuário logado.
session_start();

// O login só será validado quando o formulário enviar POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os campos enviados pelo formulário.
    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";

    // Usuário fixo usado apenas para a prática da aula.
    $usuarioCorreto = "admin";
    $senhaCorreta = "123";

    // Compara os dados recebidos com os dados esperados.
    if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {

        // Guarda o usuário na sessão para liberar páginas protegidas.
        $_SESSION["usuario"] = $usuario;
        header("Location: home.php");
        exit;
    } else {

        // Mostra erro simples quando o login falhar.
        echo "Usuário ou senha inválidos.";
        echo "<br><br>";
        echo '<a href="login.php">Tentar novamente</a>';
        exit;
    }
}

// Se acessar diretamente sem POST, volta para o login.
header("Location: login.php");
exit;
