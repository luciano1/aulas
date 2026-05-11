import { useState } from "react";

// Importação dos componentes
import Botao from "./Botao";
import Display from "./Display";
import InputNumero from "./InputNumero";

function Calculadora() {

  // Estados da aplicação
  const [numero1, setNumero1] = useState("");
  const [numero2, setNumero2] = useState("");
  const [resultado, setResultado] = useState("");

  // Valida se os campos foram preenchidos
  function validarCampos() {
    if (numero1 === "" || numero2 === "") {
      setResultado("Preencha os dois números");
      return false;
    }

    return true;
  }

  // Soma
  function somar() {
    if (!validarCampos()) return;

    setResultado(Number(numero1) + Number(numero2));
  }

  // Subtração
  function subtrair() {
    if (!validarCampos()) return;

    setResultado(Number(numero1) - Number(numero2));
  }

  // Multiplicação
  function multiplicar() {
    if (!validarCampos()) return;

    setResultado(Number(numero1) * Number(numero2));
  }

  // Divisão
  function dividir() {
    if (!validarCampos()) return;

    if (Number(numero2) === 0) {
      setResultado("Não é possível dividir por zero");
    } else {
      setResultado(Number(numero1) / Number(numero2));
    }
  }

  // Limpa os campos
  function limpar() {
    setNumero1("");
    setNumero2("");
    setResultado("");
  }

  return (
    <div>
      <h1>Calculadora React</h1>

      {/* Primeiro campo numérico */}
      <InputNumero
        valor={numero1}
        aoAlterar={(e) => setNumero1(e.target.value)}
        placeholder="Digite o primeiro número"
      />

      {/* Segundo campo numérico */}
      <InputNumero
        valor={numero2}
        aoAlterar={(e) => setNumero2(e.target.value)}
        placeholder="Digite o segundo número"
      />

      <br /><br />

      {/* Botões das operações */}
      <Botao texto="Somar" aoClicar={somar} />
      <Botao texto="Subtrair" aoClicar={subtrair} />
      <Botao texto="Multiplicar" aoClicar={multiplicar} />
      <Botao texto="Dividir" aoClicar={dividir} />
      <Botao texto="Limpar" aoClicar={limpar} />

      <hr />

      {/* Exibe o resultado */}
      <Display resultado={resultado} />
    </div>
  );
}

export default Calculadora;
