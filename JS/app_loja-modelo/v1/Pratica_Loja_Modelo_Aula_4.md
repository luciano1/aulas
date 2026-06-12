# Prática com Loja Modelo - Aula 4

**Disciplina:** Desenvolvimento Mobile com React Native  
**Professor:** Luciano Rocha

---

## Objetivo

Utilizar a loja criada nas aulas anteriores para implementar novas funcionalidades e reforçar os conceitos de:

- useState
- TextInput
- Button
- Arrays e Objetos
- Props
- FlatList
- Atualização de Estado

---

# Prática 1 - Total de Produtos

Exibir na tela a quantidade total de produtos cadastrados.

### Exemplo

```jsx
<Text>
  Total de produtos: {products.length}
</Text>
```

### Conceitos

- Arrays
- Renderização dinâmica

---

# Prática 2 - Categoria do Produto

Adicionar um novo campo ao formulário:

```txt
Categoria
```

### Objetivos

- Criar novo estado
- Capturar dados com TextInput
- Exibir a categoria no card do produto

---

# Prática 3 - Limpar Formulário

Criar um botão:

```txt
Limpar
```

### Função sugerida

```jsx
function limparFormulario() {
  setNomeProduto("");
  setPrecoProduto("");
}
```

---

# Prática 4 - Produto Mais Caro

Exibir na tela:

```txt
Produto mais caro:
Mochila Adventure
```

### Desafio

Percorrer o array de produtos e identificar o item com maior preço.

---

# Prática 5 - Remover Último Produto

```jsx
function removerUltimo() {
  const novaLista = products.slice(0, -1);
  setProducts(novaLista);
}
```

---

# Prática 6 - Controle de Estoque

Adicionar ao produto:

```txt
Quantidade
```

Exemplo:

```jsx
{
  id: 1,
  name: "Tênis",
  price: "199,90",
  quantity: 10
}
```

---

# Prática 7 - Produto Selecionado

Utilizar TouchableOpacity para selecionar um produto e exibir seus dados em destaque.

---

# Desafio Extra

Transforme a loja em outro tema:

- Pet Shop
- Biblioteca
- Loja de Jogos
- Loja de Celulares
- Loja de Roupas

---

# Resultado Esperado

Ao final da prática o aluno deverá ser capaz de:

- Adicionar produtos
- Exibir produtos
- Atualizar listas
- Manipular estados
- Trabalhar com eventos no React Native
