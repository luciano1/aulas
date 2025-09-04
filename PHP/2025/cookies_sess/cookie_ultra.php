<?php
// Define cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  setcookie('nome', $_POST['nome'] ?? '', time()+3600, '/');
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}
// Apaga cookie
if (isset($_GET['apagar'])) {
  setcookie('nome', '', time()-1, '/');
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}
$nome = $_COOKIE['nome'] ?? 'Visitante';
?>
<!DOCTYPE html>
<meta charset="utf-8">
<h2>Olá, <?= htmlspecialchars($nome) ?></h2>

<form method="post">
  <input name="nome" placeholder="Seu nome">
  <button>Salvar nome (cookie)</button>
</form>

<p>
  <a href="?apagar=1">Apagar cookie</a> |
  <a href="?">Recarregar</a>
</p>
