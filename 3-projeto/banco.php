<?php

require_once 'src/Conta.php';
require_once 'src/Endereco.php';
require_once 'src/Titular.php';
require_once 'src/CPF.php';

$endereco = new Endereco('Praia Grande', 'Aviação', 'Rua 7', "71B");
$hugo = new Titular(new CPF('123.456.789-12'),'Hugo do Valle', $endereco);
$primeiraConta = new Conta($hugo);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$luiza = new Titular(new CPF('987.765.432-56'), 'Keila P', $endereco);
$segundaConta = new Conta($luiza);
unset($segundaConta);
echo Conta::recuperaNumeroDeContas();

$outroEndereco = new Endereco('PG', "PP", 'Rua 5', '55A');
$outra = new Conta(new Titular(new CPF('123.654.444-56'), 'teste', $outroEndereco));