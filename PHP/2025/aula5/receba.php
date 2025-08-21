<?php
// Só processa se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erros = [];

    // Normaliza vírgula → ponto
    $pesoRaw   = str_replace(',', '.', $_POST['peso'] ?? '');
    $alturaRaw = str_replace(',', '.', $_POST['altura'] ?? '');

    // 1) Verifica se foram preenchidos
    if ($pesoRaw === '' || $alturaRaw === '') {
        $erros[] = "Preencha peso e altura.";
    }

    // 2) Checa se são numéricos
    if (!is_numeric($pesoRaw)) {
        $erros[] = "Peso deve ser numérico.";
    }
    if (!is_numeric($alturaRaw)) {
        $erros[] = "Altura deve ser numérica.";
    }

    // 3) Converte e valida regras
    if (!$erros) {
        $peso = (float)$pesoRaw;
        $altura = (float)$alturaRaw;

        if ($peso <= 0) {
            $erros[] = "Peso deve ser maior que 0.";
        }
        if ($altura <= 0) {
            $erros[] = "Altura deve ser maior que 0.";
        }
    }

    // Se não houver erros → calcula
    if (!$erros) {
        $imc = $peso / ($altura * $altura);

        if ($imc < 18.5) {
            $nivel = "Magreza";
        } elseif ($imc < 25) {
            $nivel = "Normal";
        } elseif ($imc < 30) {
            $nivel = "Sobrepeso";
        } elseif ($imc < 35) {
            $nivel = "Obesidade I";
        } elseif ($imc < 40) {
            $nivel = "Obesidade II";
        } else {
            $nivel = "Obesidade III";
        }

        echo "<h2>Resultado</h2>";
        echo "IMC: <b>" . number_format($imc, 2, ',', '.') . "</b><br>";
        echo "Nível: <b>$nivel</b>";
    } else {
        // Mostra erros
        echo "<h2>Erros encontrados:</h2>";
        foreach ($erros as $erro) {
            echo "<p style='color:red'>• $erro</p>";
        }
        echo "<br><a href='index.html'>Voltar</a>";
    }
} else {
    echo "Acesse pelo formulário.";
}
?>
