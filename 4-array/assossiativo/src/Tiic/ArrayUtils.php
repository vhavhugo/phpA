<?php
namespace Tiic;
 
class ArrayUtils{
	public static function remover($elemento, &$array){
		$posicao = array_search($elemento, $array, true);
		if(is_int($posicao)){
			unset($array[$posicao]);	
		}else{
			echo "Não foi encontrado no array";
		}
	}

	public static function encontrarPessoasComSaldoMaior(int $saldo, array $array){
		$correntistasComSaldoMaior = array();
		foreach($array as $chave => $valor){
			if($valor > $saldo){
				$correntistasComSaldoMaior[] = $chave;
			}
		}
		return $correntistasComSaldoMaior;
	}
}
