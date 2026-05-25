import { useState } from "react";
import Header from "./components/Header";
import FormularioAnimal from "./components/FormularioAnimal";
import ListaAnimais from "./components/ListaAnimais";

function App() {
  // Array inicial com objetos
  const [animais, setAnimais] = useState([
  ]);

  // Função que recebe um novo animal e adiciona no array
  function adicionarAnimal(novoAnimal) {
    setAnimais([...animais, novoAnimal]);
  }

  return (
    <div className="container">
      <Header />

      <FormularioAnimal adicionarAnimal={adicionarAnimal} />

      <ListaAnimais animais={animais} />
    </div>
  );
}

export default App;
