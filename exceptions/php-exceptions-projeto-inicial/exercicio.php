<?php

$nome = "Alura";
echo 'ANTES' . PHP_EOL;

try {
    echo $nome . PHP_EOL;
} catch(RuntimeException $problema) {
    echo 'CATCH' . PHP_EOL;
}

echo 'DEPOIS' . PHP_EOL;