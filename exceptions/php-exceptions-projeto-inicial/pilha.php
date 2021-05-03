<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try{
    funcao2();
    } catch (RuntimeException | DivisionByZeroError $erroOuExcecao) {
        echo $erroOuExcecao->getMessage() . PHP_EOL; // traz a mensagem do problema
        echo $erroOuExcecao->getLine() . PHP_EOL; // vê a linha que aconteceu
       // echo $erroOuExcecao->getFile() . PHP_EOL; // vê qual o arquivo
       // echo $erroOuExcecao->getTrace() . PHP_EOL; //pega como um array
        echo $erroOuExcecao->getTraceAsString() . PHP_EOL; //pega formatado como string - trilha de execução até chegar aonde esse erro acoteceu

        //echo "Na função 1, eu resolvi o problema da função 2" . PHP_EOL;
        throw new RuntimeException(
            'Exceção foi tratada, mais, pega ai',
            1,
            $erroOuExcecao
        );
    }
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;

    throw new RuntimeException('', 0, new RuntimeException());
    
   // $arrayFixo = new SplFixedArray(2);
   // $arrayFixo[3] = "Valor";
    //$divisao = intdiv(5, 0);
    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    echo 'Saindo da função 2' . PHP_EOL;
}
var_dump(1);
echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
