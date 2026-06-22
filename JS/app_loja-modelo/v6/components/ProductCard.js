import { Image, TouchableOpacity, StyleSheet, Text, View } from "react-native";

/*
  ProductCard mostra um único produto.

  Ao tocar no card, executamos a função aoSelecionar.
  No projeto, ela abre a tela de detalhes.
*/
function ProductCard({ item, aoSelecionar }) {
  return (
    <TouchableOpacity style={styles.card} onPress={() => aoSelecionar(item)}>
      <Image source={{ uri: item.image }} style={styles.image} />

      <View style={styles.info}>
        <Text style={styles.name}>{item.name}</Text>
        <Text style={styles.price}>R$ {item.price}</Text>
        <Text style={styles.text}>Categoria: {item.category}</Text>
        <Text style={styles.text}>Estoque: {item.quantity}</Text>
      </View>
    </TouchableOpacity>
  );
}

const styles = StyleSheet.create({
  card: {
    backgroundColor: "#ffffff",
    borderRadius: 8,
    overflow: "hidden",
    marginBottom: 12,
    borderWidth: 1,
    borderColor: "#dddddd"
  },
  image: {
    width: "100%",
    height: 150
  },
  info: {
    padding: 12
  },
  name: {
    fontWeight: "bold",
    fontSize: 18
  },
  price: {
    marginVertical: 8,
    color: "#e63946",
    fontSize: 16,
    fontWeight: "bold"
  },
  text: {
    color: "#444444",
    marginBottom: 4
  }
});

export default ProductCard;
