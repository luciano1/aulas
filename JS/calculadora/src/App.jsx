import { useState } from "react";

function App() {
  const [numero1, setNumero1] = useState("");
  const [numero2, setNumero2] = useState("");
  const [resultado, setResultado] = useState("");

  function somar() {
    setResultado(Number(numero1) + Number(numero2));
  }

  function subtrair() {
    setResultado(Number(numero1) - Number(numero2));
  }

  function multiplicar() {
    setResultado(Number(numero1) * Number(numero2));
  }

  function dividir() {
    if (Number(numero2) === 0) {
      setResultado("Não é possível dividir por zero");
    } else {
      setResultado(Number(numero1) / Number(numero2));
    }
  }

  function limpar() {
    setNumero1("");
    setNumero2("");
    setResultado("");
  }

  return (
    <div>
      <h1>Calculadora React</h1>

      <input
        type="number"
        placeholder="Digite o primeiro número"
        value={numero1}
        onChange={(e) => setNumero1(e.target.value)}
      />

      <input
        type="number"
        placeholder="Digite o segundo número"
        value={numero2}
        onChange={(e) => setNumero2(e.target.value)}
      />

      <br /><br />

      <button onClick={somar}>Somar</button>
      <button onClick={subtrair}>Subtrair</button>
      <button onClick={multiplicar}>Multiplicar</button>
      <button onClick={dividir}>Dividir</button>
      <button onClick={limpar}>Limpar</button>

      <h2>Resultado: {resultado}</h2>
    </div>
  );
}

export default App;