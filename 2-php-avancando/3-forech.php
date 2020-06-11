<?php

$contaCorrentes = [
    12345678910 => [
        'titular' => 'Vinicius',
        'saldo' => 1000
    ],
    12584444446 => [
        'titular' => 'Maria',
        'saldo' => 10000
    ],
    12584444488 => [
        'titular' => 'Alberto',
        'saldo' => 300
    ]
];

$contaCorrentes[12584444488] = [
  'titular' => 'Claudia',
  'saldo'   => 2000
];

foreach ($contaCorrentes as $cpf => $conta){
    echo $conta['titular'] . "<br>";
}

