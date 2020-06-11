<?php

require_once("src/Conta.php");

// $conta = ['123.456.789-10' => ['titular' => 'Vinicius', 'saldo' => 500]];
// $conta['123.456.789-10']['saldo'] -= 700;
// var_dump($conta);

$primeiraConta = new Conta();
$primeiraConta->saldo = 200;