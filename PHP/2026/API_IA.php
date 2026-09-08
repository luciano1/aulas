<?php
header('Content-Type: text/plain; charset=utf-8');

$token = 'SEU TOKEN';
$texto = 'Hoje estamos aprendendo a consumir uma API.';

$url = 'https://router.huggingface.co/hf-inference/models/papluca/xlm-roberta-base-language-detection';
$curl = curl_init($url);
curl_setopt_array($curl, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ],
    CURLOPT_POSTFIELDS => json_encode([
        'inputs' => $texto,
        'parameters' => ['top_k' => 1]
    ])
]);
$resposta = curl_exec($curl);
curl_close($curl);

// JSON convertido.
$resultado = json_decode($resposta, true);
echo "Texto: $texto\n";
print_r($resultado);
