import {
  Image,
  TouchableOpacity,
  StyleSheet,
  Text,
  View,
  Button,
} from "react-native";

/*
  ProductCard mostra um único produto na tela.

  Ele também permite:
  - selecionar o produto
  - excluir o produto
*/
function ProductCard({ item, selecionarProduto, excluirProduto }) {
  return (
    <TouchableOpacity
      style={styles.card}

      /*
        Quando tocar no card,
        o produto será selecionado.
      */
      onPress={() => selecionarProduto(item)}
    >
      <Image
        source={{ uri: item.image }}
        style={styles.image}
      />

      <View style={styles.info}>
        <Text style={styles.name}>{item.name}</Text>

        <Text style={styles.price}>
          R$ {item.price}
        </Text>

        <Button
          title="Excluir"
          color="#e63946"
          onPress={() => excluirProduto(item.id)}
        />
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
    fontSize: 16,
    fontWeight: "bold",
  },
});

export default ProductCard;