<?php
header('Content-Type: text/plain; charset=utf-8');

function falhar($mensagem) {
    http_response_code(500);
    echo "Erro: $mensagem\n";
    exit(1);
}

// O arquivo de credencial fica fora da pasta pública.
$token = trim(getenv('HF_TOKEN') ?: '');
$arquivo = __DIR__ . '/.secrets/hf_token';
if ($token === '' && is_readable($arquivo)) {
    $token = trim(file_get_contents($arquivo));
}
if ($token === '') {
    falhar('Defina HF_TOKEN ou preencha .secrets/hf_token com seu token.');
}
if (!extension_loaded('curl')) {
    falhar('A extensão cURL do PHP não está habilitada.');
}
$texto = 'ustedes son unos cabrones';
$url = 'https://router.huggingface.co/hf-inference/models/papluca/xlm-roberta-base-language-detection';
$curl = curl_init($url);
curl_setopt_array($curl, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 15,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ],
    CURLOPT_POSTFIELDS => json_encode([
        'inputs' => $texto,
        'parameters' => ['top_k' => 1]
    ], JSON_UNESCAPED_UNICODE)
]);
$resposta = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$erro = curl_errno($curl);
curl_close($curl);
if ($resposta === false) {
    falhar("Falha de conexão cURL (código $erro).");
}
if ($status < 200 || $status >= 300) {
    falhar("Hugging Face retornou HTTP $status. Verifique as permissões do token, créditos e disponibilidade do modelo.");
}
$resultado = json_decode($resposta, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    falhar('A API não retornou JSON válido.');
}
$predicao = $resultado[0][0] ?? $resultado[0] ?? null;
if (!is_array($predicao) || !isset($predicao['label'], $predicao['score'])) {
    falhar('A API retornou uma estrutura inesperada.');
}
echo "Texto: $texto\n";
echo 'Idioma: ' . $predicao['label'] . "\n";
echo 'Pontuação: ' . round($predicao['score'] * 100, 2) . "%\n";
