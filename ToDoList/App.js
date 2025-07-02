import React, { useState } from 'react';
import { View, Text, Button, StyleSheet, TextInput,FlatList} from 'react-native';

export default function App() {
  const [tarefas, setTarefas] = useState([]);
  const [novaTarefa, setNovaTarefa] = useState('');
  const [pretoBranco, setPretoBranco] = useState(false);

  const estiloFundo = pretoBranco ? styles.pretoBranco : styles.normal;
  const estiloTexto = pretoBranco ? styles.textoPB : styles.textoColorido;
  const estiloHeader = pretoBranco ? styles.headerPB : styles.headerColorido;
  const estiloFooter = pretoBranco ? styles.footerPB : styles.footerColorido;

  function adicionarTarefa() {
    if (novaTarefa.trim() === '') return;
    setTarefas([...tarefas, { id: Date.now().toString(), titulo: novaTarefa }]);
    setNovaTarefa('');
  }
  const deletarTarefa=(id)=>{
    setTarefas(tarefas.filter(tarefa=> tarefa.id !== id));
  }

  return (
    <View style={[styles.container, estiloFundo]}>
      {/* Botão no canto superior direito */}
      <View style={styles.botaoTopoDireita}>
        <Button
          title="PB"
          onPress={() => setPretoBranco(!pretoBranco)}
          color={pretoBranco ? '#000' : '#555'}
        />
      </View>

      <Header estiloHeader={estiloHeader} estiloTexto={estiloTexto} />
      <View style={styles.body}>
        <Text style={[styles.title, estiloTexto]}>Minhas Tarefas</Text>
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
          renderItem={({ item }) => 
            <Tarefa 
              titulo={item.titulo} 
              estiloTexto={estiloTexto}
              onDelete={()=>deletarTarefa(item.id)} 
            />}
          style={{ marginTop: 20 }}
        />


      </View>
      <Footer estiloFooter={estiloFooter} estiloTexto={estiloTexto} />
    </View>
  );
}

function Header({ estiloHeader, estiloTexto }) {
  return (
    <View style={[styles.headerBase, estiloHeader]}>
      <Text style={[styles.headerText, estiloTexto]}>Minhas Tarefas</Text>
    </View>
  );
}

function Footer({ estiloFooter, estiloTexto }) {
  return (
    <View style={[styles.footerBase, estiloFooter]}>
      <Text style={[styles.footerText, estiloTexto]}>Desenvolvido na aula de React Native</Text>
    </View>
  );
}

function Tarefa({ titulo, estiloTexto,onDelete }) {
  return (
    <View style={styles.tarefa}>
      <Text style={[styles.tarefaTexto, estiloTexto]}>{titulo} </Text>
      <Button title="Deletar" onPress={onDelete} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'space-between',
  },
  normal: {
    backgroundColor: '#F4F4F4',
  },
  pretoBranco: {
    backgroundColor: '#000',
  },
  textoColorido: {
    color: '#333',
  },
  textoPB: {
    color: '#fff',
  },
  botaoTopoDireita: {
    position: 'absolute',
    top: 40,
    right: 20,
    zIndex: 1,
  },
  headerBase: {
    paddingVertical: 40,
    paddingHorizontal: 20,
  },
  headerColorido: {
    backgroundColor: '#6200ee',
  },
  headerPB: {
    backgroundColor: '#222',
  },
  headerText: {
    fontSize: 22,
    fontWeight: 'bold',
  },
  body: {
    padding: 20,
    flex: 1,
    marginTop: 80, // para não ficar escondido atrás do botão
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
    marginBottom: 20,
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
  footerBase: {
    paddingVertical: 20,
    alignItems: 'center',
  },
  footerColorido: {
    backgroundColor: '#ff9800',
  },
  footerPB: {
    backgroundColor: '#444',
  },
  footerText: {
    fontSize: 14,
  },
});
