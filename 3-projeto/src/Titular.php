<?php

class Titular
{
    private $cpf;
    private $nome;
    private $endereco;

    public function __construct(string $cpf, string $nome, Endereco $endereco)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function validaNomeTitular(string $nomeTitular)
    {
        if(strlen($nomeTitular) < 5){
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }

    public function recuperaCpf(): string
    {
        return $this->cpf;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaEndereco(): Endereco
    {
        return $this->endereco;
    }
   
}