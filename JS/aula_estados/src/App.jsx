import { useState } from "react";

function App() {
  // Estado que controla o valor do contador (começa em 100)
  const [contador, setContador] = useState(100);

  // Guarda o valor digitado em tempo real (enquanto o usuário digita)
  const [nomeDigitado, setNomeDigitado] = useState("");

  // Guarda o nome somente após clicar no botão (valor "confirmado")
  const [nomeConfirmado, setNomeConfirmado] = useState("");

  return (
    <div>
      {/* Exibe o valor atual do contador */}
      <h1>{contador}</h1>

      {/* Ao clicar, aumenta o contador em +1 */}
      <button onClick={() => setContador(contador + 1)}>
        Aumentar
      </button>

      {/* Reseta o contador para 0 */}
      <button onClick={() => setContador(0)}>
        Zerar
      </button>

      {/* Diminui o contador em -1 */}
      <button onClick={() => setContador(contador - 1)}>
        Diminuir
      </button>

      <hr />

      <div>
        {/* 
          INPUT CONTROLADO:
          - O valor do input vem do estado (nomeDigitado)
          - Toda digitação atualiza o estado
          - Isso faz o React controlar o campo
        */}
        <input
          type="text"
          placeholder="Digite para ver em tempo real..."
          value={nomeDigitado}
          onChange={(e) => setNomeDigitado(e.target.value)}
        />

        {/* 
          Exibição em tempo real:
          Sempre que o usuário digita, o estado muda e a tela atualiza automaticamente
        */}
        <h1>Olá em tempo real: {nomeDigitado}</h1>

        <hr />

        {/* 
          Botão que "confirma" o nome:
          Copia o valor digitado para outro estado (nomeConfirmado)
        */}
        <button onClick={() => setNomeConfirmado(nomeDigitado)}>
          Confirmar Nome
        </button>

        {/* 
          Exibição do valor confirmado:
          Só muda quando o botão é clicado
          (diferente do nomeDigitado, que muda em tempo real)
        */}
        <h1>Olá confirmado: {nomeConfirmado}</h1>
      </div>
    </div>
  );
}

export default App;