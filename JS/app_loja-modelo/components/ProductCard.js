import React from 'react';
import { Image, Pressable, StyleSheet, Text, View } from 'react-native';

// Componente ProductCard
// Responsabilidade: mostrar UM produto.
// As props deixam o card reutilizavel para qualquer produto.
function ProductCard({ name, price, image }) {
  return (
    <View style={styles.card}>
      <Image source={{ uri: image }} style={styles.image} />

      <View style={styles.info}>
        <Text style={styles.name}>{name}</Text>
        <Text style={styles.price}>R$ {price}</Text>

        <Pressable style={styles.button}>
          <Text style={styles.buttonText}>Adicionar ao carrinho</Text>
        </Pressable>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  card: {
    flex: 1,
    backgroundColor: '#ffffff',
    borderRadius: 8,
    overflow: 'hidden',
  },
  image: {
    width: '100%',
    height: 120,
  },
  info: {
    padding: 12,
  },
  name: {
    fontWeight: 'bold',
  },
  price: {
    marginVertical: 8,
    color: '#e63946',
    fontSize: 16,
    fontWeight: 'bold',
  },
  button: {
    backgroundColor: '#222222',
    padding: 10,
    borderRadius: 4,
  },
  buttonText: {
    color: '#ffffff',
    textAlign: 'center',
  },
});

export default ProductCard;
