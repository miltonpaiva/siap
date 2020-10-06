<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

header("Access-Control-Allow-Origin: *");

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected static function clearString ($string, $is_number = false) 
	{

		// APENAS NUMEROS
		if($is_number){
			return preg_replace("/[^0-9]/", "", $string);
		}

		// REMOVE ACENTOS
		$string = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ) );

		// APENAS MINUSCULAS
		$string = strtolower($string);

		// REMOVE ESPAÇOS
		$string = str_replace(' ','',$string);

		return $string;
	}

}
