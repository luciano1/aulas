import {
  Image,
  TouchableOpacity,
  StyleSheet,
  Text,
  View,
} from "react-native";

// Mostra um unico produto.
function ProductCard({ item, selecionarProduto }) {
  return (
    <TouchableOpacity
      style={styles.card}
      onPress={() => selecionarProduto(item)}
    >
      <Image source={{ uri: item.image }} style={styles.image} />

      <View style={styles.info}>
        <Text style={styles.name}>{item.name}</Text>
        <Text style={styles.price}>R$ {item.price}</Text>
        <Text>Categoria: {item.category}</Text>
        <Text>Estoque: {item.quantity}</Text>
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
  },
  image: {
    width: "100%",
    height: 120,
  },
  info: {
    padding: 12,
  },
  name: {
    fontWeight: "bold",
    fontSize: 18,
  },
  price: {
    marginVertical: 8,
    color: "#e63946",
    fontSize: 8,
    fontWeight: "bold",
  },
});

export default ProductCard;
