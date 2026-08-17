# Sistema de Biblioteca

Projeto didático em PHP para praticar login, sessão, cookies, conexão com MySQL e CRUD de livros.

## Funcionalidades

- Login simples com sessão.
- Proteção de páginas internas.
- Cadastro de livros.
- Listagem de livros.
- Edição de livros.
- Exclusão de livros com confirmação.
- Preferência de categoria salva em cookie.

## Acesso

Usuário:

```text
admin
```

Senha:

```text
123
```

## Banco de Dados

O arquivo `biblioteca.sql` cria o banco `biblioteca`, recria a tabela `livros` e insere dados de exemplo.

Para importar:

```bash
mysql -u root -p123456 < biblioteca.sql
```

## Executar o Sistema

Na pasta do projeto:

```bash
php -S 127.0.0.1:8088
```

Depois acesse:

```text
http://127.0.0.1:8088
```

## Organização dos Arquivos

A divisão dos arquivos foi feita por responsabilidade. Assim, cada pasta guarda uma parte específica do sistema.

```text
biblioteca/
├── README.md
├── biblioteca.sql
├── index.php
├── home.php
├── auth/
│   ├── login.php
│   ├── logout.php
│   └── validar_login.php
├── config/
│   └── conexao.php
├── exemplos/
│   └── contador.php
├── includes/
│   ├── funcoes.php
│   └── proteger.php
├── livros/
│   ├── atualizar.php
│   ├── cadastrar.php
│   ├── editar.php
│   ├── excluir.php
│   ├── listar.php
│   ├── remover.php
│   └── salvar.php
└── preferencias/
    ├── remover.php
    └── salvar.php
```

## Responsabilidade das Pastas

- `auth/`: arquivos de autenticação, como login, validação e logout.
- `config/`: configuração do projeto, como a conexão com o banco.
- `includes/`: arquivos reutilizados por várias páginas.
- `livros/`: páginas e ações do CRUD de livros.
- `preferencias/`: ações ligadas ao cookie de categoria favorita.
- `exemplos/`: arquivos usados apenas como prática ou demonstração.

## Principais Arquivos

- `index.php`: redireciona para o login.
- `home.php`: página inicial após o login.
- `auth/login.php`: formulário de login.
- `auth/validar_login.php`: valida usuário e senha.
- `auth/logout.php`: encerra a sessão.
- `includes/proteger.php`: bloqueia páginas sem login.
- `includes/funcoes.php`: funções de validação.
- `config/conexao.php`: conexão com o banco usando PDO.
- `livros/listar.php`: lista os livros cadastrados.
- `livros/cadastrar.php`: formulário de cadastro.
- `livros/salvar.php`: grava novo livro no banco.
- `livros/editar.php`: formulário de edição.
- `livros/atualizar.php`: atualiza o livro no banco.
- `livros/excluir.php`: confirma a exclusão.
- `livros/remover.php`: remove o livro do banco.
- `preferencias/salvar.php`: salva categoria favorita em cookie.
- `preferencias/remover.php`: remove o cookie de preferência.
