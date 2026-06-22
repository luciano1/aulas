import { useState } from "react";
import { View, Text, TextInput, Button, StyleSheet, ScrollView } from "react-native";

/*
  CadastroScreen permite:
  - cadastrar produto
  - editar produto
  - excluir produto
*/
function CadastroScreen({ products, atualizarLista }) {
  const [nomeProduto, setNomeProduto] = useState("");
  const [precoProduto, setPrecoProduto] = useState("");
  const [categoriaProduto, setCategoriaProduto] = useState("");
  const [quantidadeProduto, setQuantidadeProduto] = useState("");

  /*
    Se produtoEditando for null, estamos cadastrando.
    Se tiver um produto, estamos editando.
  */
  const [produtoEditando, setProdutoEditando] = useState(null);

  function salvarProduto() {
    if (
      nomeProduto === "" ||
      precoProduto === "" ||
      categoriaProduto === "" ||
      quantidadeProduto === ""
    ) {
      alert("Preencha todos os campos.");
      return;
    }

    /*
      Se existe produtoEditando, vamos atualizar.
    */
    if (produtoEditando) {
      const listaAtualizada = products.map((produto) => {
        if (produto.id === produtoEditando.id) {
          return {
            ...produto,
            name: nomeProduto,
            price: precoProduto,
            category: categoriaProduto,
            quantity: quantidadeProduto
          };
        }

        return produto;
      });

      atualizarLista(listaAtualizada);
      limparFormulario();
      return;
    }

    /*
      Caso contrário, vamos cadastrar um novo produto.
    */
    const novoProduto = {
      id: Date.now().toString(),
      name: nomeProduto,
      price: precoProduto,
      category: categoriaProduto,
      quantity: quantidadeProduto,
      image: "https://placehold.co/300x220/222222/ffffff/png?text=Produto"
    };

    atualizarLista([...products, novoProduto]);
    limparFormulario();
  }

  /*
    Preenche os inputs com os dados do produto escolhido.
  */
  function prepararEdicao(produto) {
    setProdutoEditando(produto);
    setNomeProduto(produto.name);
    setPrecoProduto(produto.price);
    setCategoriaProduto(produto.category);
    setQuantidadeProduto(produto.quantity);
  }

  /*
    Remove produto específico usando filter.
  */
  function excluirProduto(id) {
    const novaLista = products.filter((produto) => produto.id !== id);
    atualizarLista(novaLista);

    if (produtoEditando && produtoEditando.id === id) {
      limparFormulario();
    }
  }

  function limparFormulario() {
    setNomeProduto("");
    setPrecoProduto("");
    setCategoriaProduto("");
    setQuantidadeProduto("");
    setProdutoEditando(null);
  }

  return (
    <ScrollView style={styles.screen}>
      <Text style={styles.title}>
        {produtoEditando ? "Editando Produto" : "Novo Produto"}
      </Text>

      <View style={styles.formulario}>
        <Text style={styles.label}>Nome</Text>
        <TextInput
          style={styles.input}
          placeholder="Ex: Camiseta"
          value={nomeProduto}
          onChangeText={setNomeProduto}
        />

        <Text style={styles.label}>Preço</Text>
        <TextInput
          style={styles.input}
          placeholder="Ex: 59.90"
          value={precoProduto}
          onChangeText={setPrecoProduto}
          keyboardType="numeric"
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
          keyboardType="numeric"
        />

        <Button
          title={produtoEditando ? "Atualizar Produto" : "Cadastrar Produto"}
          onPress={salvarProduto}
        />

        <View style={styles.espaco}>
          <Button title="Limpar" onPress={limparFormulario} />
        </View>
      </View>

      <Text style={styles.subtitulo}>Produtos cadastrados</Text>

      {products.map((produto) => (
        <View key={produto.id} style={styles.item}>
          <Text style={styles.itemNome}>{produto.name}</Text>
          <Text>R$ {produto.price}</Text>
          <Text>Categoria: {produto.category}</Text>
          <Text>Estoque: {produto.quantity}</Text>

          <View style={styles.espaco}>
            <Button title="Editar" onPress={() => prepararEdicao(produto)} />
          </View>

          <View style={styles.espaco}>
            <Button
              title="Excluir"
              color="#e63946"
              onPress={() => excluirProduto(produto.id)}
            />
          </View>
        </View>
      ))}
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  screen: {
    flex: 1,
    backgroundColor: "#f5f5f5",
    padding: 16
  },
  title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 12
  },
  formulario: {
    backgroundColor: "#ffffff",
    padding: 12,
    borderRadius: 8,
    marginBottom: 16
  },
  label: {
    fontWeight: "bold",
    marginBottom: 4
  },
  input: {
    borderWidth: 1,
    borderColor: "#cccccc",
    borderRadius: 6,
    padding: 8,
    marginBottom: 10,
    backgroundColor: "#ffffff"
  },
  espaco: {
    marginTop: 8
  },
  subtitulo: {
    fontSize: 20,
    fontWeight: "bold",
    marginBottom: 8
  },
  item: {
    backgroundColor: "#ffffff",
    padding: 12,
    borderRadius: 8,
    marginBottom: 12
  },
  itemNome: {
    fontSize: 18,
    fontWeight: "bold"
  }
});

export default CadastroScreen;
