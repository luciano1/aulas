<?php
// index.php
session_start();
require_once __DIR__ . '/lib/config.php';
require_once __DIR__ . '/lib/hf_client.php';
putenv('HF_TOKEN= ');//Token para teste

if (!isset($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = array(); // ['role'=>'user|assistant', 'content'=>string]
}

if (isset($_GET['clear']) && $_GET['clear'] === '1') {
    $_SESSION['chat_history'] = array();
    header('Location: index.php');
    exit;
}

$error = null;

// Envio 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = getenv('HF_TOKEN') ? getenv('HF_TOKEN') : '';
    $user = trim(isset($_POST['user']) ? $_POST['user'] : '');

    if ($token === '') {
        $error = 'Defina a variável de ambiente HF_TOKEN para usar o chat.';
    } elseif ($user === '') {
        $error = 'Digite sua mensagem.';
    } else {
        $messages = array();
        if ($CONFIG['SYSTEM_PROMPT'] !== '') {
            $messages[] = array('role'=>'system','content'=>$CONFIG['SYSTEM_PROMPT']);
        }
        $hist = $_SESSION['chat_history'];
        if (count($hist) > 0) {
            $slice = array_slice($hist, max(0, count($hist) - $CONFIG['MAX_TURNS']));
            foreach ($slice as $m) {
                $messages[] = array('role'=>$m['role'], 'content'=>$m['content']);
            }
        }
        $messages[] = array('role'=>'user', 'content'=>$user);

        try {
            $resp = hf_chat_completion(
                $CONFIG['BASE_URL'],
                $token,
                $CONFIG['MODEL'],
                $messages,
                $CONFIG['MAX_TOKENS'],
                $CONFIG['TEMPERATURE'],
                false
            );

            $assistant = '(sem conteúdo)';
            if (isset($resp['choices'][0]['message']['content'])) {
                $assistant = $resp['choices'][0]['message']['content'];
            } elseif (isset($resp['choices'][0]['delta']['content'])) {
                $assistant = $resp['choices'][0]['delta']['content'];
            }

            $_SESSION['chat_history'][] = array('role'=>'user', 'content'=>$user);
            $_SESSION['chat_history'][] = array('role'=>'assistant', 'content'=>$assistant);

        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

// helper
function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// Concatenação em formato content (Q/A)
function build_transcript($history) {
    $out = '';
    for ($i = 0; $i < count($history); $i++) {
        if ($history[$i]['role'] === 'user') {
            $q = $history[$i]['content'];
            $a = '';
            if ($i + 1 < count($history) && $history[$i+1]['role'] === 'assistant') {
                $a = $history[$i+1]['content'];
            }
            $out .= "Q: " . $q . "\n";
            if ($a !== '') {
                $out .= "A: " . $a . "\n";
            }
            $out .= "----\n";
        }
    }
    return $out;
}
$transcript = build_transcript($_SESSION['chat_history']);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chat — PHP 7 + HF Router</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/styles.css" rel="stylesheet">
</head>
<body>
  <div class="container py-4" style="max-width: 900px;">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h1 class="h4 mb-0">Chat</h1>
      <a class="btn btn-sm btn-outline-secondary" href="?clear=1">Limpar</a>
    </div>

    <div class="card shadow-sm">
      <div class="card-body">
        <div id="chatWindow" class="chat-window">
          <?php if (empty($_SESSION['chat_history'])): ?>
            <div class="text-muted small mb-3">Comece a conversa enviando uma mensagem.</div>
          <?php else: ?>
            <?php foreach ($_SESSION['chat_history'] as $msg): ?>
              <?php if ($msg['role'] === 'user'): ?>
                <div class="chat-row justify-content-end">
                  <div class="bubble bubble-user"><?= nl2br(h($msg['content'])) ?></div>
                </div>
              <?php elseif ($msg['role'] === 'assistant'): ?>
                <div class="chat-row">
                  <div class="bubble bubble-assistant"><?= nl2br(h($msg['content'])) ?></div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="card-footer">
        <?php if ($error): ?>
          <div class="alert alert-danger py-2 mb-2"><?= h($error) ?></div>
        <?php endif; ?>
        <form method="post" class="d-flex gap-2">
          <input type="text" class="form-control" name="user" placeholder="Digite sua mensagem...">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>

    <div class="card shadow-sm mt-3">
      <div class="card-header d-flex align-items-center">
        <span>Transcrição concatenada (content)</span>
        <button class="btn btn-sm btn-outline-secondary ms-auto" id="copyBtn">Copiar</button>
      </div>
      <div class="card-body">
        <pre id="transcript" class="bg-light p-3 rounded border" style="white-space: pre-wrap;"><?= h($transcript) ?></pre>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('copyBtn')?.addEventListener('click', () => {
      const el = document.getElementById('transcript');
      const txt = el ? el.innerText : '';
      navigator.clipboard.writeText(txt).then(() => alert('Transcrição copiada.'));
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
