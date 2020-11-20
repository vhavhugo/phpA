<?php

namespace Tiic\Banco\Modelo\Conta;

class Conta{

    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function saca(float $valorASacar): void
    {
        
        $tarifaSaque = $valorASacar * 0.05;
        $valorSaque = $valorASacar + $tarifaSaque;
        if($valorSaque > $this->saldo){
            echo "Saldo indisponível";
            return;
        }
        $this->saldo -= $valorSaque;
    }

    public function deposita(float $valorADepositar): void
    {
        if($valorADepositar < 0){
            echo "valor precisa ser positivo";
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if($valorATransferir > $this->saldo){
            echo "saldo indisponível";
            return;
        }
        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public static function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
}


// function criarConta(string $cpf, string $nomeTitular, float $saldo): array
// {
//     return[
//         $cpf => [
//             'titular' => $nomeTitular,
//             'saldo' => $saldo
//         ]
//     ];
// }