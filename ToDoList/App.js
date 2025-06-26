import { View, Text, Button, StyleSheet, TextInput } from 'react-native';

export default function App() {
  return (
    <View style={styles.container}>
      <Header />
      <Body />
      <Footer />
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

function Body() {
  return(
    <View style={styles.body}>
      <Text style={styles.text}>Bem-vindo ao App de Tarefas!</Text>
      
      <Tarefa a="Criar um footer"/>
      <Tarefa a="Criar um body"/>
      <Tarefa a="Criar um header"/>
    </View>
  );
}

function Footer() {
  return (
    <View style={styles.footer}>
      <Text style={styles.footerText}>A organização mora aqui!</Text>
    </View>
  );
}

function Tarefa(props){
  return(
    <View>
      <Text>{props.a}</Text>
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
  footerText: {
    fontFamily: 'Times New Roman',
    color: 'white',
    fontSize: 18,
    fontWeight: 'bold',
  },
  footer: {
    backgroundColor: '#ff9800',
    paddingVertical: 70,
    alignItems: 'center',
    marginTop: 'auto',
  },
});
