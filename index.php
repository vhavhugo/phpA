<?php

$correntistas = [
    'Giovanni',
    'João',
    'Maria',
    'Luis',
    'Luiza',
    'Rafael'
];

$correntistasNaoPagantes = [
    'Luis',
    'Luisa',
    'Rafael',
];

$correntistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);

echo "<pre>";
var_dump($correntistasNaoPagantes);
echo "</pre>";
