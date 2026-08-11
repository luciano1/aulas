# Prática — Adicionar telefone ao cadastro

## Com base no [projeto](https://github.com/luciano1/aulas/tree/d807f127a9f8a4eb5b4f4787e692681241475500/PHP/2024/aula8) :
## Missão

O sistema já permite cadastrar usuários com:

```text
Nome
E-mail
Senha
```

Sua tarefa é adicionar:

```text
Telefone
```

O telefone deverá funcionar no cadastro, na listagem e na edição.

## Arquivos utilizados

```text
cadastro.php
index.php
editar.php
```

Não altere:

```text
delete.php
```

---

## Etapa 1 — Alterar o banco

No phpMyAdmin, adicione a coluna `telefone` à tabela `usuarios`.

Dica:

```sql
ALTER TABLE usuarios
ADD COLUMN telefone VARCHAR(20);
```

Confira se a coluna foi criada.

---

## Etapa 2 — Alterar o cadastro

No arquivo:

```text
cadastro.php
```

Adicione um campo para o telefone no formulário:

```text
Telefone: __________________
```

Depois, altere o PHP para:

1. receber o telefone pelo `POST`;
2. incluir o telefone no `INSERT`;
3. salvar o telefone no banco.

Dica:

```php
$_POST["telefone"]
```

---

## Etapa 3 — Mostrar na listagem

No arquivo:

```text
index.php
```

Faça as alterações necessárias para mostrar uma nova coluna:

| Nome | E-mail | Telefone | Senha |
|---|---|---|---|

Lembre-se de alterar:

1. o `SELECT`;
2. o cabeçalho da tabela;
3. a linha exibida dentro do `foreach`.

Dica:

```php
$row["telefone"]
```

---

## Etapa 4 — Alterar a edição

No arquivo:

```text
editar.php
```

Faça o telefone:

1. aparecer preenchido no formulário;
2. ser recebido pelo `POST`;
3. ser atualizado pelo comando `UPDATE`.

---

## Teste obrigatório

Cadastre:

```text
Nome: Maria Silva
E-mail: maria@email.com
Telefone: (31) 99999-9999
Senha: 123
```

Depois:

1. confira o telefone na listagem;
2. altere o telefone para `(31) 98888-8888`;
3. salve a edição;
4. confira o novo telefone;
5. verifique o registro no phpMyAdmin.

---

