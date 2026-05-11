// Campo reutilizável para entrada de números
function InputNumero({ valor, aoAlterar, placeholder }) {
  return (
    <input
      type="number"
      value={valor}
      onChange={aoAlterar}
      placeholder={placeholder}
    />
  );
}

export default InputNumero;
