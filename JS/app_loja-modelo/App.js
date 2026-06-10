import { useState } from 'react';
import { View, Text, TextInput, Button, StyleSheet } from 'react-native';
import Navbar from './components/Navbar';
import ProductList from './components/ProductList';

export default function App() {
  const [nomeProduto, setNomeProduto] = useState('');
  const [precoProduto, setPrecoProduto] = useState();
  const [products, setProducts] = useState([]);

  function adicionarProduto() {
    if (nomeProduto === '' || precoProduto === '') {
      alert('Preencha o nome e o preço do produto.');
      return;
    }
    const novoProduto = {
      id: Date.now().toString(),
      name: nomeProduto,
      price: precoProduto,
    };
    setProducts([...products, novoProduto]);

    setNomeProduto('');
    setPrecoProduto('');
  }

  return (
    <View style={styles.screen}>
      <Navbar />

      <View style={styles.content}>
        <Text style={styles.title}>Nossos Produtos</Text>
        <Text style={styles.subtitle}>
          Loja estatica criada com componentes, props e lista com FlatList.
        </Text>

        <View>
          <Text>Nome do Produto</Text>
          <TextInput
            placeholder="Ex: Camiseta"
            value={nomeProduto}
            onChangeText={setNomeProduto}
          />
          <Text>Preço</Text>
          <TextInput
            placeholder="67,61"
            value={precoProduto}
            onChangeText={setPrecoProduto}
          />
          <Button title="Adicionar Produto" onPress={adicionarProduto} />
        </View>

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
