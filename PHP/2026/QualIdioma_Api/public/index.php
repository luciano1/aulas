<?php
$caminho = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if (!in_array($caminho, ['/', '/index.php'], true)) {
    http_response_code(404);
    header('Content-Type: text/plain; charset=utf-8');
    exit('Página não encontrada.');
}
require dirname(__DIR__) . '/index.php';
