<?php

error_reporting(E_All);

init_set('display_errors', 1); // liga e desliga - mostrar erros
//init_set('log_errors', 1); // Ativar log dos erros = 1
//init_set('error_log', '/var/log/minha-apicacao'); // O caminho dos logs

set_error_handler(function($errno, $errstr, $errfile, $errline){
    switch($errno){
        case E_WARNING:
            echo "Aviso: Isso é perigoso";
            break;
        case E_NOTICE:
            echo "Melhor não fazer isso";
            break;
    }
});

echo $variavel;
echo $array[12];

echo CONSTANTE;