<?php

require 'ArrayUtils.php';

$correntistas_e_compras = [
	"Giovanni",
	"João",
	12,
	"Maria",
	25,
	"Luis",
	"Luiza",
	"12"
];

echo '<pre>';
var_dump($correntistas_e_compras);
ArrayUtils::remover(12, $correntistas_e_compras);
var_dump($correntistas_e_compras);
echo '<pre>';