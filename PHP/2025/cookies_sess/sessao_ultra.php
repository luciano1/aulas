<?php
session_start();
if (isset($_GET['login'])) $_SESSION['user'] = 'admin';
if (isset($_GET['sair'])) { session_unset(); session_destroy(); header('Location: '.$_SERVER['PHP_SELF']); exit; }
$user = $_SESSION['user'] ?? null;
?>
<!doctype html><meta charset="utf-8">
<?php if ($user): ?>
  <h3>Logado: <?= htmlspecialchars($user) ?></h3>
  <a href="?sair=1">Sair</a>
<?php else: ?>
  <h3>Você não está logado.</h3>
  <a href="?login=1">Login</a>
<?php endif; ?>
