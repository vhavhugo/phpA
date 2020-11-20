<?php

use Alura\Reflection\ClasseExemplo;

require_once 'vendor/autoload.php';

$idade = 22;

$variavel = "idade";

// echo gettype($idade);
echo $$variavel;

$nomeCompletoClasse = 'Alura\Reflection\ClasseExemplo';

$objeto = new $nomeCompletoClasse();

var_dump($objeto);