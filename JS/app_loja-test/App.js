import { useState } from 'react';
import {
  View,
  Text,
  TextInput,
  Button,
  StyleSheet,
  ScrollView,
} from 'react-native';
import Navbar from './components/Navbar';
import ProductList from './components/ProductList';

// Aula 2 e 3 - Componentes e Props
// Loja estatica em React Native, inspirada no roteiro da aula.
// Nesta aula NAO usamos estado, login, API ou carrinho funcionando.
// O objetivo e entender: componentes, props, array de dados e listas.-

// App e o componente principal.
// Ele funciona como orquestrador: organiza a tela e passa dados para os filhos.
export default function App() {
  const [text, setText] = useState('');
  const [products, setProducts] = useState([
    {
      id: '1',
      name: 'Tenis Esportivo',
      price: '199,90',
      image: 'https://placehold.co/300x220/222222/ffffff/png?text=Tenis',
    },
    {
      id: '2',
      name: 'Mochila Adventure',
      price: '1149,90',
      image: 'https://placehold.co/300x220/0f766e/ffffff/png?text=Mochila',
    },
    {
      id: '3',
      name: 'Oculos de Sol',
      price: '489,90',
      image: 'https://placehold.co/300x220/f59e0b/111111/png?text=Oculos',
    },
  ]);
  return (
    <View style={styles.screen}>
      <Navbar />

      <View style={styles.content}>
        <Text style={styles.title}>Nossos Produtos</Text>
        <Text style={styles.subtitle}>
          Loja estatica criada com componentes, props e lista com FlatList.
        </Text>

        <ProductList products={products} />
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  screen: {
    flex: 1,
    backgroundColor: '#f5f5f5',
  },
  content: {
    flex: 1,
    padding: 16,
  },
  title: {
    fontSize: 26,
    fontWeight: 'bold',
    color: '#222222',
  },
  subtitle: {
    marginVertical: 8,
    color: '#666666',
  },
});
