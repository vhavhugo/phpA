<?php
require 'Calculadora.php';

$notas = [5, 9, 10, 3, 10, 5];


$calculadora = new Calculadora();
$media = $calculadora->calculaMedia($notas);

if($media){
    echo "A media é: $media";

}else{
    echo "Não foi possível calcular a média";
}