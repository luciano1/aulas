<?php
// Modelo simples com 3 rótulos: NEGATIVE/NEUTRAL/POSITIVE
$model = 'cardiffnlp/twitter-xlm-roberta-base-sentiment';

// 1) Pegue o token do ambiente (ou coloque provisoriamente no lugar do fallback)
$token = getenv('HF_API_TOKEN') ?: 'SEU_TOKEN_AQUI';

// 2) Texto de entrada
$texto = 'Adorei a aula!';

// 3) Monta a requisição
$url = "https://api-inference.huggingface.co/models/$model";
$payload = ['inputs' => $texto];

$ch = curl_init($url);
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $token",
    "Content-Type: application/json",
    "Accept: application/json",
  ],
  CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
  CURLOPT_TIMEOUT => 60,
]);
$body = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// 4) Verifica se deu certo
if ($code < 200 || $code >= 300) {
  die("Erro HTTP $code\n$body\n");
}

// 5) Entender a resposta (modo iniciante: laço simples)
$data = json_decode($body, true);  // vira array
$labels = $data[0];                // lista de rótulos p/ esse texto

$melhorRotulo = '';
$melhorScore  = -1;
foreach ($labels as $item) {
  if (isset($item['label'], $item['score']) && $item['score'] > $melhorScore) {
    $melhorScore  = $item['score'];
    $melhorRotulo = $item['label'];
  }
}

// 6) Traduz e exibe
$traduz = ['NEGATIVE'=>'Negativo','NEUTRAL'=>'Neutro','POSITIVE'=>'Positivo'];
$rotuloPt  = $traduz[$melhorRotulo] ?? $melhorRotulo;
$percentual = round($melhorScore * 100, 1);

echo "Resultado: $rotuloPt ({$percentual}%)\n";
