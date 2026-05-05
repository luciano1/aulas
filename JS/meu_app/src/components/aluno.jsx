function Aluno({ nome, idade, curso, cidade }) {
  return (
    <div>
      <h2>{nome}</h2>
      <p>Idade: {idade}</p>
      <p>Curso: {curso}</p>
      <p>Cidade: {cidade}</p>
    </div>
  );
}
export default Aluno;