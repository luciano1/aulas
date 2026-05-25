import { useState } from "react";

function FormularioAnimal({ adicionarAnimal }) {
  // Estados dos inputs
  const [animal, setAnimal] = useState("");
  const [raca, setRaca] = useState("");
  const [nome, setNome] = useState("");

  function salvarAnimal(evento) {
    evento.preventDefault(); // Correção: use o parâmetro 'evento' recebido na função

    // Validação simples
    if (!animal || !raca || !nome) {
      alert("Preencha todos os campos.");
      return;
    }
    // Cria um objeto com os dados digitados
    const novoAnimal = { animal, raca, nome };

    // 1. Busca a lista existente no localStorage ou cria uma nova vazia
    const animaisSalvos = JSON.parse(localStorage.getItem("animais")) || [];

    // 2. Adiciona o novo animal à lista local
    animaisSalvos.push(novoAnimal);

    // 3. Salva a lista atualizada de volta no localStorage em formato de string
    localStorage.setItem("animais", JSON.stringify(animaisSalvos));

    // Envia o novo objeto para o componente App
    adicionarAnimal(novoAnimal);

    // Limpa os campos após salvar
    setAnimal("");
    setRaca("");
    setNome("");
  }

  return (
    <form className="formulario" onSubmit={salvarAnimal}>
      <h2>Novo Animal</h2>

      <input
        type="text"
        placeholder="Animal. Ex: Cachorro"
        value={animal}
        onChange={(e) => setAnimal(e.target.value)}
      />

      <input
        type="text"
        placeholder="Raça. Ex: Labrador"
        value={raca}
        onChange={(e) => setRaca(e.target.value)}
      />

      <input
        type="text"
        placeholder="Nome. Ex: Thor"
        value={nome}
        onChange={(e) => setNome(e.target.value)}
      />

      <button type="submit">Cadastrar</button>
    </form>
  );
}

export default FormularioAnimal;
