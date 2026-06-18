import { FlatList, StyleSheet } from "react-native";
import ProductCard from "./ProductCard";

// Recebe a lista e cria um card para cada produto.
function ProductList({ products, selecionarProduto }) {
  return (
    <FlatList
      data={products}
      keyExtractor={(product) => product.id}
      renderItem={({ item }) => (
        <ProductCard
          item={item}
          selecionarProduto={selecionarProduto}
        />
      )}
      contentContainerStyle={styles.list}
    />
  );
}

const styles = StyleSheet.create({
  list: {
    paddingBottom: 24,
  },
});

export default ProductList;
