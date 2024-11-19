<?php

$temperatura = $_GET['temperatura'];
$select_temp = $_GET['select_temp'];

if ($select_temp == "FpC") {
    $resultado = 5/9 * ($temperatura - 32);
    echo "Temperatura em Celsius: $resultado";
}
if ($select_temp == "CpF") {
    $resultado = ($temperatura * 9/5) + 32;
    echo "Temperatura em Fahrenheit: $resultado";
}

?>
