<?php

// Envia o visitante para a tela de login.
header("Location: auth/login.php");

// Garante que nenhum código continue rodando após o redirecionamento.
exit;
