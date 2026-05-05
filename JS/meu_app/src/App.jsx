import Header from "./components/Header";
import Aluno from "./components/Aluno";

function App() {
  return (
    <div>
      <Header disciplina= "BD" />

      <Aluno 
        nome="Ana Clara" 
        idade={18} 
        curso="Desenvolvimento de Sistemas" 
        cidade="Montes Claros" 
      />

      <Aluno 
        nome="Carlos Eduardo" 
        idade={20} 
        curso="React JS" 
        cidade="Janaúba" 
      />

      <Aluno 
        nome="Maria Fernanda" 
        idade={19} 
        curso="Programação Front-End" 
        cidade="Pirapora" 
      />
    </div>
  );
}

export default App;
