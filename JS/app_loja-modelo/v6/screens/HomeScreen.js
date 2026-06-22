import { View, Text, Button, StyleSheet } from "react-native";
import ProductList from "../components/ProductList";

/*
  HomeScreen é a tela inicial.
  Ela lista produtos e possui botão para ir ao cadastro.
*/
function HomeScreen({ navigation, products }) {
  /*
    Ao tocar em um produto, vamos para a tela Detalhes
    enviando o produto como parâmetro.
  */
  function abrirDetalhes(produto) {
    navigation.navigate("Detalhes", { produto });
  }

  return (
    <View style={styles.screen}>
      <Text style={styles.title}>Produtos</Text>

      <Text style={styles.subtitle}>
        Total de produtos: {products.length}
      </Text>

      <View style={styles.buttonArea}>
        <Button
          title="Novo Produto"
          onPress={() => navigation.navigate("Cadastro")}
        />
      </View>

      <ProductList products={products} aoSelecionar={abrirDetalhes} />
    </View>
  );
}

const styles = StyleSheet.create({
  screen: {
    flex: 1,
    backgroundColor: "#f5f5f5",
    padding: 16
  },
  title: {
    fontSize: 26,
    fontWeight: "bold",
    color: "#222222"
  },
  subtitle: {
    marginVertical: 8,
    color: "#666666",
    fontWeight: "bold"
  },
  buttonArea: {
    marginVertical: 12
  }
});

export default HomeScreen;
