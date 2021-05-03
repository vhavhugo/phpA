<?php

class MinhaExcecao extends DomainException{

}

try{
    throw new MinhaExcecao();
}catch (MinhaExcecao $e){
    $e->exibeHugo();
}