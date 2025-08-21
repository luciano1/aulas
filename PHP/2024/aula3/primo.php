<?php
$num = $_POST['number'];
echo "Number: $num<br>";
$conta = 0;

for ($i = 1; $i <= sqrt($num); $i++) { 
    if ($num % $i == 0) {
        $conta++;
    }
}

if ($conta == 1) {
    echo "Eh primo";
} else {
    echo "Nao primo";
}
?>
