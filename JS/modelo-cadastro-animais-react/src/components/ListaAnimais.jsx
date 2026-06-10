//import EditIcon from '@mui/icons-material/Edit';

function ListaAnimais({ animais }) {
  return (
    <section className="lista">
      <h2>Animais Cadastrados</h2>

      {/* O map percorre o array e cria um card para cada animal */}
      {animais.map((item, index) => (
        <div className="card" key={index}>
          <h3>{item.nome}</h3>
          <p>Animal: {item.animal}</p>
          <p>Raça: {item.raca}</p>
          <p>
          </p>
        </div>
      ))}
    </section>
  );
}

export default ListaAnimais;
