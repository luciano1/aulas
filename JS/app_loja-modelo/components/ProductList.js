import React from 'react';
import { FlatList, StyleSheet } from 'react-native';
import ProductCard from './ProductCard';

// Componente ProductList
// Responsabilidade: receber um array e transformar cada item em um ProductCard.
function ProductList({ products }) {
  return (
    <FlatList
      data={products}
      keyExtractor={(product) => product.id}
      numColumns={2}
      columnWrapperStyle={styles.row}
      contentContainerStyle={styles.list}
      renderItem={({ item }) => (
        <ProductCard
          name={item.name}
          price={item.price}
          image={item.image}
        />
      )}
    />
  );
}

const styles = StyleSheet.create({
  list: {
    paddingBottom: 24,
  },
  row: {
    gap: 12,
    marginBottom: 12,
  },
});

export default ProductList;
