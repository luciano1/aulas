import { View, Text, Button, StyleSheet } from 'react-native';

export default function App() {
  return (
    <View style={styles.container}>
      <Header />
      <View style={styles.body}>
        <Text style={styles.text}>Bem-vindo ao App de Tarefas!</Text>
        <Button title="Adicionar Tarefa" onPress={() => alert('Funcionalidade em breve!')} />
      </View>
    </View>
  );
}

function Header() {
  return (
    <View style={styles.header}>
      <Text style={styles.headerText}>Minhas Tarefas</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#F4F4F4',
  },
  header: {
    backgroundColor: '#6200ee',
    paddingVertical: 40,
    paddingHorizontal: 20,
  },
  headerText: {
    color: 'white',
    fontSize: 22,
    fontWeight: 'bold',
  },
  body: {
    padding: 20,
  },
  text: {
    fontSize: 18,
    marginBottom: 20,
  },
});
