import { FlatList, StyleSheet } from "react-native";
import ProductCard from "./ProductCard";

/*
  ProductList recebe a lista de produtos
  e transforma cada produto em um ProductCard.
*/
function ProductList({ products, selecionarProduto, excluirProduto }) {
  return (
    <FlatList
      data={products}

      /*
        keyExtractor diz qual campo será usado
        como identificador único.
      */
      keyExtractor={(product) => product.id}

      /*
        renderItem define como cada item da lista
        será exibido.
      */
      renderItem={({ item }) => (
        <ProductCard
          item={item}
          selecionarProduto={selecionarProduto}
          excluirProduto={excluirProduto}
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