<?php

class Titular extends Pessoa
{
    private $endereco;

    public function __construct(string $cpf, string $nome, Endereco $endereco)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->endereco = $endereco;
    }
    
    public function recuperaEndereco(): Endereco
    {
        return $this->endereco;
    }
    
}