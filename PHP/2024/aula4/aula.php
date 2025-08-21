<?php
$num = $_GET['number'];
$i = $num;

$result = 1;

while ($num > 0) { 
    $result = $result * $num; 
    $num--;           
}
echo "Fatorial de ".$i.": ".$result;