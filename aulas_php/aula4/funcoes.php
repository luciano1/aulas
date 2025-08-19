<?php
// ===========================================
// DISCIPLINA: PROGRAMAÇÃO BACK-END
// Professor: Luciano Rocha
// Curso Técnico em Desenvolvimento de Sistemas
// -------------------------------------------
// Exemplo de uso das funções nativas do PHP
// com explicações para iniciantes
// ===========================================

// ---------- 1. STRINGS ----------
echo "<h2>1) Strings</h2>";

$frase = "php é incrível";

// Tamanho do texto
echo "Tamanho: " . strlen($frase) . "<br>";

// Caixa alta e baixa
echo strtoupper($frase) . "<br>";
echo strtolower("PHP") . "<br>";

// Primeira letra maiúscula
echo ucfirst("php") . "<br>";
echo ucwords("curso de php") . "<br>";

// Substituição e posição
$texto = "Aprendendo PHP com exemplos";
echo substr($texto, 0, 10) . "<br>";         // 'Aprendendo'
echo str_replace("PHP", "Java", $texto) . "<br>";
echo "Posição do PHP: " . strpos($texto, "PHP") . "<br>";

// ---------- 2. ARRAYS ----------
echo "<h2>2) Arrays</h2>";

$nums = [10, 20, 30];
echo "Quantidade: " . count($nums) . "<br>";

// Adiciona e remove elementos
array_push($nums, 40);
echo "Após push: "; print_r($nums); echo "<br>";

$removido = array_pop($nums);
echo "Após pop (removeu $removido): "; print_r($nums); echo "<br>";

// Junta arrays
$a = ["a"=>1, "b"=>3]; 
$b = ["c"=>2];
$unido = array_merge($a, $b);
echo "Arrays unidos: "; print_r($unido); echo "<br>";

// Ordenações
$x = [3,1,2];
sort($x);
echo "Ordenado: "; print_r($x); echo "<br>";

// ---------- 3. MATEMÁTICA ----------
echo "<h2>3) Matemática</h2>";

echo "Valor absoluto: " . abs(-5) . "<br>";
echo "Arredondado: " . round(10.456, 2) . "<br>";
echo "Pra cima: " . ceil(10.1) . "<br>";
echo "Pra baixo: " . floor(10.9) . "<br>";
echo "Maior: " . max(3,9,2) . "<br>";
echo "Menor: " . min([5,2,8]) . "<br>";
echo "Número formatado: " . number_format(1234.5, 2, ',', '.') . "<br>";
echo "Aleatório entre 1 e 100: " . rand(1, 100) . "<br>";

// ---------- 4. DATAS ----------
echo "<h2>4) Datas</h2>";

date_default_timezone_set('America/Sao_Paulo');
echo "Agora: " . date("d/m/Y H:i") . "<br>";

$prazo = strtotime("+7 days");
echo "Daqui 7 dias: " . date("d/m/Y", $prazo) . "<br>";

// ---------- 5. ARQUIVOS ----------
echo "<h2>5) Arquivos</h2>";

// Criando e lendo arquivo simples
file_put_contents("dados.txt", "linha 1\nlinha 2");
$conteudo = file_get_contents("dados.txt");
echo nl2br($conteudo) . "<br>";

// Escrevendo em log
$fp = fopen("log.txt", "a");
fwrite($fp, date("H:i:s")." - Acesso\n");
fclose($fp);

// ---------- 6. VARIÁVEIS E DEBUG ----------
echo "<h2>6) Variáveis</h2>";

$nome = "Ana"; 
$vazio = "";

echo isset($nome) ? "Nome existe<br>" : "Nome não existe<br>";
echo empty($vazio) ? "Variável está vazia<br>" : "Tem valor<br>";

// Estruturas para debug
$arr = ["a"=>1,"b"=>2];
echo "print_r: "; print_r($arr); echo "<br>";
echo "var_dump: "; var_dump($arr);

?>
