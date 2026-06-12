import React from 'react';
import { StyleSheet, Text, View } from 'react-native';

// Componente Navbar
// Responsabilidade: mostrar o topo da loja.
// Ele nao recebe props porque, nesta aula, os dados do topo sao fixos.
function Navbar() {
  return (
    <View style={styles.navbar}>
      <Text style={styles.logo}>MinhaLoja</Text>
      <Text style={styles.cart}>Carrinho (0)</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  navbar: {
    backgroundColor: '#222222',
    padding: 12,
    flexDirection: 'row',
    justifyContent: 'space-between',
  },
  logo: {
    color: '#ffffff',
    fontSize: 20,
    fontWeight: 'bold',
  },
  cart: {
    color: '#ffffff',
  },
});

export default Navbar;
