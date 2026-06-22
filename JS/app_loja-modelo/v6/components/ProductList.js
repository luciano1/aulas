import { FlatList, Text, View, StyleSheet } from "react-native";
import ProductCard from "./ProductCard";

/*
  ProductList recebe o array de produtos e transforma
  cada produto em um ProductCard usando FlatList.
*/
function ProductList({ products, aoSelecionar }) {
  if (products.length === 0) {
    return (
      <View style={styles.empty}>
        <Text>Nenhum produto cadastrado.</Text>
      </View>
    );
  }

  return (
    <FlatList
      data={products}
      keyExtractor={(product) => product.id}
      renderItem={({ item }) => (
        <ProductCard item={item} aoSelecionar={aoSelecionar} />
      )}
      contentContainerStyle={styles.list}
    />
  );
}

const styles = StyleSheet.create({
  list: {
    paddingBottom: 24
  },
  empty: {
    backgroundColor: "#ffffff",
    padding: 16,
    borderRadius: 8,
    alignItems: "center"
  }
});

export default ProductList;
