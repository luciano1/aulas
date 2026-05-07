import { useState } from "react";

function App() {
  const [contador, setContador] = useState(0);

  return (
    <div>
      <h1>{contador}</h1>

      <button onClick={() => setContador(contador + 1)}>
        Aumentar
      </button>

      <button onClick={() => setContador(contador - 1)}>
        Diminuir
      </button>
    </div>
  );
}

export default App;