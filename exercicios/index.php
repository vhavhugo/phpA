<?php

$correntistas = [
    'Giovanni',
    'Jo�o',
    'Maria',
    'Luis',
    'Luisa',
    'Rafael',
];

$correntistasNaoPagantes = [
    'Luis',
    'Luisa',
    'Rafael',
];

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000,
];

$corretistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);
$correntistas_saldos = array_combine($correntistas, $saldos);
$correntistas_saldos["Marcio"] = 6600;

echo "<p>O saldo do Giovanni � {$correntistas_saldos['Giovanni']}</p>";

if(array_key_exists("Joao", $correntistas_saldos)){
    echo $correntistas_saldos["Joao"];
}else{
    echo "N�o existe no array";
}

$correntistas = array();
$correntistas = [
    'Giovanni' => 2500,
    'Jo�o' => 3000,
    'Maria' => 4400,
    'Luis' => 1000,
    'Luisa' => 8700,
    'Rafael' => 9000,
];
echo '<pre>'; print_r($correntistas_saldos);exit;







