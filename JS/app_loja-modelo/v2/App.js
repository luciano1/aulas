import { useState } from "react";
import { View, Text, TextInput, Button, StyleSheet } from "react-native";

import Navbar from "./components/Navbar";
import ProductList from "./components/ProductList";

export default function App() {
  /*
    products guarda a lista de produtos.

    Cada produto é um objeto com:
    - id
    - name
    - price
    - image
  */
  const [products, setProducts] = useState([]);

  /*
    nomeProduto guarda o que o aluno digita
    no campo "Nome do Produto".
  */
  const [nomeProduto, setNomeProduto] = useState("");

  /*
    precoProduto guarda o que o aluno digita
    no campo "Preço".
  */
  const [precoProduto, setPrecoProduto] = useState("");

  /*
    produtoSelecionado guarda o produto clicado na lista.

    Começa como null porque, no início,
    nenhum produto foi selecionado.
  */
  const [produtoSelecionado, setProdutoSelecionado] = useState(null);

  /*
    Função para adicionar produto.

    Ela pega os valores digitados nos inputs,
    cria um objeto e adiciona esse objeto na lista.
  */
  function adicionarProduto() {
    if (nomeProduto === "" || precoProduto === "") {
      alert("Preencha nome e preço.");
      return;
    }

    const novoProduto = {
      id: Date.now().toString(),
      name: nomeProduto,
      price: precoProduto,
      image: "https://placehold.co/300x220/222222/ffffff/png?text=Produto",
    };

    /*
      Atualiza a lista.

      ...products copia os produtos antigos.
      novoProduto adiciona o produto novo.
    */
    setProducts([...products, novoProduto]);

    // Limpa os campos depois de cadastrar
    setNomeProduto("");
    setPrecoProduto("");
  }

  /*
    Função para excluir produto.

    Recebe o id do produto que será removido.
  */
  function excluirProduto(id) {
    /*
      filter cria uma nova lista.

      Mantemos apenas os produtos com id diferente
      do id recebido.
    */
    const novaLista = products.filter((produto) => produto.id !== id);

    // Atualiza a lista sem o produto removido
    setProducts(novaLista);

    // Limpa o produto selecionado
    setProdutoSelecionado(null);
  }

  return (
    <View style={styles.screen}>
      <Navbar />

      <View style={styles.content}>
        <Text style={styles.title}>Nossos Produtos</Text>

        <Text style={styles.subtitle}>
          Loja mobile com cadastro, seleção e exclusão.
        </Text>

        {/* FORMULÁRIO */}
        <View style={styles.formulario}>
          <Text>Nome do Produto</Text>

          <TextInput
            style={styles.input}
            placeholder="Ex: Camiseta"
            value={nomeProduto}
            onChangeText={setNomeProduto}
          />

          <Text>Preço</Text>

          <TextInput
            style={styles.input}
            placeholder="Ex: 59,90"
            value={precoProduto}
            onChangeText={setPrecoProduto}
          />

          <Button
            title="Adicionar Produto"
            onPress={adicionarProduto}
          />
        </View>

        {/* MOSTRA O PRODUTO CLICADO */}
        {produtoSelecionado && (
          <View style={styles.selecionado}>
            <Text>Produto Selecionado:</Text>
            <Text>{produtoSelecionado.name}</Text>
            <Text>R$ {produtoSelecionado.price}</Text>
          </View>
        )}

        {/* TOTAL DE PRODUTOS */}
        <Text style={styles.total}>
          Total de produtos: {products.length}
        </Text>

        {/* LISTA DE PRODUTOS */}
        <ProductList
          products={products}
          selecionarProduto={setProdutoSelecionado}
          excluirProduto={excluirProduto}
        />
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  screen: {
    flex: 1,
    backgroundColor: "#f5f5f5",
  },

  content: {
    flex: 1,
    padding: 16,
  },

  title: {
    fontSize: 26,
    fontWeight: "bold",
    color: "#222222",
  },

  subtitle: {
    marginVertical: 8,
    color: "#666666",
  },

  formulario: {
    backgroundColor: "#ffffff",
    padding: 12,
    borderRadius: 8,
    marginBottom: 12,
  },

  input: {
    borderWidth: 1,
    borderColor: "#cccccc",
    borderRadius: 6,
    padding: 8,
    marginBottom: 10,
    backgroundColor: "#ffffff",
  },

  selecionado: {
    backgroundColor: "#fff3cd",
    padding: 12,
    borderRadius: 8,
    marginBottom: 12,
  },

  total: {
    marginBottom: 10,
    fontWeight: "bold",
  },
});