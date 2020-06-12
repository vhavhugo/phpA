<?php

namespace Tiic\Banco\Modelo\Conta;
use Tiic\Banco\Modelo\Pessoa;
use Tiic\Banco\Modelo\CPF;
use Tiic\Banco\Modelo\Endereco;

// Titular é uma pessoa
class Titular extends Pessoa
{
    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }
    
    public function recuperaEndereco(): Endereco
    {
        return $this->endereco;
    }
    
}