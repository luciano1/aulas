import { useEffect, useState } from "react";
import AsyncStorage from "@react-native-async-storage/async-storage";

import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";

import HomeScreen from "./screens/HomeScreen";
import CadastroScreen from "./screens/CadastroScreen";
import DetalhesScreen from "./screens/DetalhesScreen";

const STORAGE_KEY = "produtos";

const Stack = createNativeStackNavigator();

export default function App() {
  /*
    Lista principal de produtos.
    Ela fica no App.js porque será usada por várias telas.
  */
  const [products, setProducts] = useState([]);

  /*
    Quando o app abrir, carregamos os produtos salvos.
  */
  useEffect(() => {
    carregarProdutos();
  }, []);

  /*
    Busca os produtos no AsyncStorage.
  */
  async function carregarProdutos() {
    const dadosSalvos = await AsyncStorage.getItem(STORAGE_KEY);

    if (dadosSalvos) {
      setProducts(JSON.parse(dadosSalvos));
    }
  }

  /*
    Salva a lista no AsyncStorage.
    JSON.stringify transforma o array em texto.
  */
  async function salvarProdutos(lista) {
    await AsyncStorage.setItem(STORAGE_KEY, JSON.stringify(lista));
  }

  /*
    Atualiza a lista na tela e também salva no celular.
  */
  function atualizarLista(novaLista) {
    setProducts(novaLista);
    salvarProdutos(novaLista);
  }

  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Home" options={{ title: "Minha Loja" }}>
          {(props) => <HomeScreen {...props} products={products} />}
        </Stack.Screen>

        <Stack.Screen name="Cadastro" options={{ title: "Cadastro de Produto" }}>
          {(props) => (
            <CadastroScreen
              {...props}
              products={products}
              atualizarLista={atualizarLista}
            />
          )}
        </Stack.Screen>

        <Stack.Screen
          name="Detalhes"
          component={DetalhesScreen}
          options={{ title: "Detalhes do Produto" }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
