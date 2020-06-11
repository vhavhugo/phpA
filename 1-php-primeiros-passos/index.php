<?php
//$contador = 1;

//while($contador <= 15) {
//    echo "#$contador" . PHP_EOL;
//    $contador = $contador + 1;
//}

//for($contador = 1; $contador <= 15; $contador++){
//    if($contador == 13){
//        break;
//    }
//    echo "$contador" . PHP_EOL;
//}
//Números impares até 100
for($contador = 1; $contador < 100; $contador++){
    if($contador % 2 != 0){
        echo $contador;
    }
}
//taboada

$multiplicador = 3;
for($i = 0; $i <= 10; $i++){
    echo "$multiplicador x $i = " . $multiplicador * $i . "<br>";
}

//imc
$peso = 104;
$altura = 1.70;
$imc = $peso / $altura ** 2;

echo "Seu IMC é de $imc. Você está com o IMC ";

if($imc < 18.5){
    echo "abaixo";
}elseif($imc < 25){
    echo "dentro";
}else{
    echo "acima";

}
echo " do recomendado";
