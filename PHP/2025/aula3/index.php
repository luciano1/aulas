<?php
$valor=22.35;
$nums = [12,10,21,4,1];
#echo "$nums[0]";

$nomes = ["Ana", "Bruno", "Davi", "ana", "Aline"];


$produtos = [
  ["nome"=>"Mouse", "preco"=>79.9, "categoria"=>"periferico", "estoque"=>12],
  ["nome"=>"Teclado", "preco"=>199.0, "categoria"=>"periferico", "estoque"=>0],
];

$alunos = [
  ["nome"=>"João","sala"=>2,"notas"=>[7,8,6.5]], 
  ["nome"=>"Maria","sala"=>2,"notas"=>[9,9,10]],
  ["nome"=>"Lucas","sala"=>2,"notas"=>[5,6,5]],
  ["nome"=>"Ana","sala"=>2,"notas"=>[6.9,6.9,7]],
];

for($a=-2;$a>= -100;$a-=2){
    echo "$a <br>";
}
$kibe = 10;
while($kibe>0){
    echo "$kibe";
    $kibe--;
}


?>