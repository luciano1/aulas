<?php
// Pegando os valores via GET
$peso   = $_GET["p"];
$altura = $_GET["a"];

$erros = [];

// 1) Obrigatoriedade (campo veio e não está vazio)
if ($peso == "") {
    $erros[] = "O peso deve ser informado.";
}
if ($altura == "") {
    $erros[] = "A altura deve ser informada.";
}

// 2) Tipo/Formato (é número?)
// Usando apenas comparação básica: se não for numérico, erro
if ($peso != "" && !is_numeric($peso)) {
    $erros[] = "O peso deve ser um número.";
}
if ($altura != "" && !is_numeric($altura)) {
    $erros[] = "A altura deve ser um número.";
}

// 3) Faixa/Regra (> 0)
if ($peso != "" && $peso <= 0) {
    $erros[] = "O peso deve ser maior que 0.";
}
if ($altura != "" && $altura <= 0) {
    $erros[] = "A altura deve ser maior que 0.";
}

// Se não tiver erros, calcula
if (count($erros) == 0) {
    $imc = $peso / ($altura * $altura);

    echo "Seu IMC é: " . $imc . "<br>";

    // Classificação do IMC
    if ($imc < 18.5) {
        echo "Classificação: Magreza";
    } elseif ($imc < 25) {
        echo "Classificação: Normal";
    } else if ($imc < 30) {
        echo "Classificação: Sobrepeso";
    } else if ($imc < 35) {
        echo "Classificação: Obesidade I";
    } else if ($imc < 40) {
        echo "Classificação: Obesidade II";
    } else {
        echo "Classificação: Obesidade III";
    }
} else {
    // Mostra todos os erros
    echo "<b>Foram encontrados os seguintes erros:</b><br>";
    foreach ($erros as $erro) {
        echo "- $erro <br>";
    }
}
?>
