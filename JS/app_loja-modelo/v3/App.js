import { useState } from "react";
import { View, Text, TextInput, Button, StyleSheet } from "react-native";

import Navbar from "./components/Navbar";
import ProductList from "./components/ProductList";

export default function App() {
  // Lista de produtos. Cada produto e um objeto.
  const [products, setProducts] = useState([
    {
      id: "1",
      name: "Tenis Esportivo",
      price: "199.90",
      category: "Calcados",
      quantity: "5",
      image: "https://placehold.co/300x220/222222/ffffff/png?text=Tenis",
    },
    {
      id: "2",
      name: "Mochila Adventure",
      price: "149.90",
      category: "Acessorios",
      quantity: "8",
      image: "https://placehold.co/300x220/0f766e/ffffff/png?text=Mochila",
    },
  ]);

  // Estados dos campos do formulario.
  const [nomeProduto, setNomeProduto] = useState("");
  const [precoProduto, setPrecoProduto] = useState("");
  const [categoriaProduto, setCategoriaProduto] = useState("");
  const [quantidadeProduto, setQuantidadeProduto] = useState("");

  // Guarda o produto tocado pelo usuario.
  const [produtoSelecionado, setProdutoSelecionado] = useState(null);

  // Adiciona um novo produto na lista.
  function adicionarProduto() {
    if (
      nomeProduto === "" ||
      precoProduto === "" ||
      categoriaProduto === "" ||
      quantidadeProduto === ""
    ) {
      alert("Preencha todos os campos.");
      return;
    }

    const novoProduto = {
      id: Date.now().toString(),
      name: nomeProduto,
      price: precoProduto,
      category: categoriaProduto,
      quantity: quantidadeProduto,
      image: "https://placehold.co/300x220/222222/ffffff/png?text=Produto",
    };

    // Copia os produtos antigos e adiciona o novo.
    setProducts([...products, novoProduto]);

    limparFormulario();
  }

  // Limpa os campos.
  function limparFormulario() {
    setNomeProduto("");
    setPrecoProduto("");
    setCategoriaProduto("");
    setQuantidadeProduto("");
  }

  // Remove o ultimo produto da lista.
  function removerUltimoProduto() {
    const novaLista = products.slice(0, -1);
    setProducts(novaLista);
    setProdutoSelecionado(null);
  }

  // Encontra o produto mais caro.
  function pegarProdutoMaisCaro() {
    if (products.length === 0) {
      return null;
    }

    let maisCaro = products[0];

    products.forEach((produto) => {
      if (Number(produto.price) > Number(maisCaro.price)) {
        maisCaro = produto;
      }
    });

    return maisCaro;
  }

  const produtoMaisCaro = pegarProdutoMaisCaro();

  return (
    <View style={styles.screen}>
      <Navbar />

      <View style={styles.content}>
        <Text style={styles.title}>Nossos Produtos</Text>

        <Text style={styles.subtitle}>
          Loja mobile com cadastro, selecao e manipulacao de listas.
        </Text>

        <View style={styles.formulario}>
          <Text style={styles.label}>Nome do Produto</Text>
          <TextInput
            style={styles.input}
            placeholder="Ex: Camiseta"
            value={nomeProduto}
            onChangeText={setNomeProduto}
          />

          <Text style={styles.label}>Preco</Text>
          <TextInput
            style={styles.input}
            placeholder="Ex: 59.90"
            value={precoProduto}
            onChangeText={setPrecoProduto}
          />

          <Text style={styles.label}>Categoria</Text>
          <TextInput
            style={styles.input}
            placeholder="Ex: Roupas"
            value={categoriaProduto}
            onChangeText={setCategoriaProduto}
          />

          <Text style={styles.label}>Quantidade</Text>
          <TextInput
            style={styles.input}
            placeholder="Ex: 10"
            value={quantidadeProduto}
            onChangeText={setQuantidadeProduto}
          />

          <Button title="Adicionar Produto" onPress={adicionarProduto} />

          <View style={styles.espacoBotao}>
            <Button title="Limpar Formulario" onPress={limparFormulario} />
          </View>

          <View style={styles.espacoBotao}>
            <Button
              title="Remover Ultimo Produto"
              color="#e63946"
              onPress={removerUltimoProduto}
            />
          </View>
        </View>

        <Text style={styles.total}>Total de produtos: {products.length}</Text>

        {produtoMaisCaro && (
          <View style={styles.destaque}>
            <Text style={styles.destaqueTitulo}>Produto mais caro:</Text>
            <Text>{produtoMaisCaro.name}</Text>
            <Text>R$ {produtoMaisCaro.price}</Text>
          </View>
        )}

        {produtoSelecionado && (
          <View style={styles.destaque}>
            <Text style={styles.destaqueTitulo}>Produto selecionado:</Text>
            <Text>Nome: {produtoSelecionado.name}</Text>
            <Text>Preco: R$ {produtoSelecionado.price}</Text>
            <Text>Categoria: {produtoSelecionado.category}</Text>
            <Text>Estoque: {produtoSelecionado.quantity}</Text>
          </View>
        )}

        <ProductList
          products={products}
          selecionarProduto={setProdutoSelecionado}
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
  label: {
    fontWeight: "bold",
    marginBottom: 4,
  },
  input: {
    borderWidth: 1,
    borderColor: "#cccccc",
    borderRadius: 6,
    padding: 8,
    marginBottom: 10,
    backgroundColor: "#ffffff",
  },
  espacoBotao: {
    marginTop: 8,
  },
  total: {
    fontWeight: "bold",
    marginBottom: 10,
  },
  destaque: {
    backgroundColor: "#fff3cd",
    padding: 12,
    borderRadius: 8,
    marginBottom: 12,
  },
  destaqueTitulo: {
    fontWeight: "bold",
    marginBottom: 4,
  },
});
