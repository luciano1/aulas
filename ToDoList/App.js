import React, { useState } from 'react';
import { View, Text, TextInput, Button, StyleSheet, FlatList } from 'react-native';

export default function App() {
  const [tarefas, setTarefas] = useState([]);
  const [novaTarefa, setNovaTarefa] = useState('');

  function adicionarTarefa() {
    if (novaTarefa.trim() === '') return;

    setTarefas([...tarefas, { id: Date.now().toString(), titulo: novaTarefa }]);
    setNovaTarefa('');
  }

  return (
    <View style={styles.container}>
      <Header />

      <View style={styles.body}>
        <Text style={styles.title}>Minhas Tarefas</Text>

        <TextInput
          style={styles.input}
          placeholder="Digite uma nova tarefa"
          value={novaTarefa}
          onChangeText={setNovaTarefa}
        />

        <Button title="Adicionar" onPress={adicionarTarefa} />

        <FlatList
          data={tarefas}
          keyExtractor={(item) => item.id}
          renderItem={({ item }) => <Tarefa titulo={item.titulo} />}
          style={{ marginTop: 20 }}
        />
      </View>

      <Footer />
    </View>
  );
}

function Header() {
  return (
    <View style={styles.header}>
      <Text style={styles.headerText}> Minhas Tarefas</Text>
    </View>
  );
}

function Footer() {
  return (
    <View style={styles.footer}>
      <Text style={styles.footerText}>Desenvolvido na aula de React Native</Text>
    </View>
  );
}

function Tarefa(props) {
  return (
    <View style={styles.tarefa}>
      <Text style={styles.tarefaTexto}>{props.titulo}</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#F4F4F4',
    justifyContent: 'space-between',
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
    flex: 1,
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
    marginBottom: 20,
  },
  input: {
    backgroundColor: 'white',
    padding: 12,
    borderRadius: 8,
    marginBottom: 10,
    borderColor: '#ddd',
    borderWidth: 1,
  },
  tarefa: {
    backgroundColor: '#e0e0e0',
    padding: 15,
    borderRadius: 8,
    marginBottom: 10,
  },
  tarefaTexto: {
    fontSize: 16,
  },
  footer: {
    backgroundColor: '#ff9800',
    paddingVertical: 20,
    alignItems: 'center',
  },
  footerText: {
    color: 'white',
    fontSize: 14,
  },
});
