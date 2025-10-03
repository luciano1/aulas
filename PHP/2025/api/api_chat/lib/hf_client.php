<?php
// lib/hf_client.php — PHP 7
function hf_chat_completion(
    $baseUrl,
    $token,
    $model,
    $messages,
    $maxTokens,
    $temperature,
    $stream // bool
) {
    $url = rtrim($baseUrl, '/') . '/chat/completions';
    $payload = array(
        'model' => $model,
        'messages' => $messages,
        'max_tokens' => $maxTokens,
        'temperature' => $temperature,
        'stream' => (bool)$stream
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 120
    ));
    $res = curl_exec($ch);
    if ($res === false) {
        $err = curl_error($ch);
        curl_close($ch);
        throw new Exception('Erro de cURL: ' . $err);
    }
    $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($res, true);
    if ($http < 200 || $http >= 300) {
        $msg = is_array($data) && isset($data['error']['message']) ? $data['error']['message'] : ('HTTP ' . $http . ' — ' . substr($res, 0, 500));
        throw new Exception('Falha na API: ' . $msg);
    }
    return is_array($data) ? $data : array();
}
