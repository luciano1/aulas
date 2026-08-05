<?php
session_start();

if (!isset($_SESSION["acessos"])) {
    $_SESSION["acessos"] = 0;
}

$_SESSION["acessos"]++;

echo $_SESSION["acessos"]; 


