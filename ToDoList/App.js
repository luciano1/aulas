import React from 'react';
import { View, Text, Button, StyleSheet } from 'react-native';

export default function App() {
  return (
    <View style={styles.container}>
      <Header />
      <View style={styles.body}>
        <Text style={styles.text}>Bem-vindo ao App de Tarefas!</Text>
        <Button title="Adicionar Tarefa" onPress={() => alert('Funcionalidade em breve!')} />
      </View>
      <Footer />
    </View>
  );
}

function Header() {
  return (
    <View style={styles.header}>
      <Text style={styles.headerText}>📋 Minhas Tarefas</Text>
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
    justifyContent: 'center',
  },
  text: {
    fontSize: 18,
    marginBottom: 20,
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
