# Detecção de idioma com Hugging Face

## Executar neste Mac

O PHP portátil fica em `.runtime/php`, com cURL incluído. Não é necessário Docker nem instalar PHP globalmente.

1. Cole somente o token em `.secrets/hf_token` (sem aspas). Esse arquivo é ignorado pelo Git, tem acesso restrito ao usuário e fica fora da pasta pública. Alternativamente, use a variável de ambiente HF_TOKEN.
2. Abra `iniciar.command` para iniciar o servidor.
3. Acesse http://127.0.0.1:8080.

Para testar no terminal, execute `./testar.command`. Para parar o servidor, pressione Ctrl+C no terminal em que ele foi iniciado.

Não cole o token no código nem na conversa. Crie ou consulte seu token manualmente em https://huggingface.co/settings/tokens, com permissão para chamadas aos Inference Providers.

## PHP já instalado

```sh
php index.php
php -S 127.0.0.1:8080 -t public
```

Use sempre `public` como raiz do servidor para não expor a credencial.

## Origem do PHP portátil

StaticPHP, distribuição macOS ARM64, PHP 8.4.23:
https://dl.static-php.dev/static-php-cli/bulk/php-8.4.23-cli-macos-aarch64.tar.gz

O binário e as credenciais são ignorados pelo Git. A configuração Docker permanece como alternativa, mas não é necessária para executar neste Mac.
