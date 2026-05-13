function ListaDisciplinas() {

  const disciplinas = ["React JS", "JavaScript", "Programacao Front-End"];
  

  return (
    <div>
      <h2>Disciplinas</h2>
      <ul>
        {disciplinas.map((disciplina) => (
          <li>{disciplina}</li>
        ))}
      </ul>
    </div>
  )
}

export default ListaDisciplinas
