import { View, Text, Image, StyleSheet, Button } from "react-native";

/*
  DetalhesScreen mostra as informações completas do produto.

  O produto chega pela navegação:
  route.params.produto
*/
function DetalhesScreen({ route, navigation }) {
  const { produto } = route.params;

  return (
    <View style={styles.screen}>
      <Image source={{ uri: produto.image }} style={styles.image} />

      <Text style={styles.title}>{produto.name}</Text>
      <Text style={styles.price}>R$ {produto.price}</Text>

      <Text style={styles.text}>Categoria: {produto.category}</Text>
      <Text style={styles.text}>Estoque: {produto.quantity}</Text>

      <View style={styles.buttonArea}>
        <Button title="Voltar" onPress={() => navigation.goBack()} />
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  screen: {
    flex: 1,
    backgroundColor: "#f5f5f5",
    padding: 16
  },
  image: {
    width: "100%",
    height: 220,
    borderRadius: 8,
    marginBottom: 16
  },
  title: {
    fontSize: 28,
    fontWeight: "bold",
    color: "#222222"
  },
  price: {
    fontSize: 22,
    fontWeight: "bold",
    color: "#e63946",
    marginVertical: 10
  },
  text: {
    fontSize: 16,
    marginBottom: 6
  },
  buttonArea: {
    marginTop: 20
  }
});

export default DetalhesScreen;
