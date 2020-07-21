<?php

$saldos = [
    2500,
    3800,
    4400,
    1000,
    8700,
    9200
];

foreach($saldos as $saldo){
    echo "<p>O saldo é $saldo</p>";
}

sort($saldos);

echo "O menor salso é: $saldos[0]";