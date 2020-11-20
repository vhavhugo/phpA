<?php
$correntistas = [
    'Giovanni',
    'João',
    'Maria',
    'Luis',
    'Luisa',
    'Rafael',
];

$saldos = [
    2500,
    3000,
    6400,
    1000,
    8700,
    9000
];

$relacionados = array_combine($correntistas, $saldos);

$maiores = ArrayUtils::encontrarPessoasComSaldoMaior(3000, $relacionados);

echo '<pre>'; print_r($relacionados);exit;