<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

header("Access-Control-Allow-Origin: *");

class QueryActionController extends Controller
{
	public static $args_query;

	public static $store_ids;
	public static $categories_relationship_stores;

	function __construct() {
		self::defineArgs();
	}

	private static function defineArgs ($table = '', $columns = '', $conditions = '', $column_in = '', $values = '')
	{
		$default_args =
			[
				'columns'	 	=> ['*'],
				'conditions' 	=>
					[
						['id', '>', 0],
					],
				'conditions_in' =>
					[
						'column' => 'id',
						'values' => [],
					],
			];

		// ARGUMENTOS PARA EXECUÇÃO DAS QUERY
		self::$args_query =
			[
				////////// ////////// ////////// ////////// ////////// //////////
				'options'   => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'criterea'   => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'questions' => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'responses' => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'startups'  => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'users'     => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'rating'    => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'participants' => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
				'attachments' => $default_args,
				////////// ////////// ////////// ////////// ////////// //////////
			];

		// DEFINIÇÃO DE ARGUMENTOS CUSTOMIZADOS
		if($columns != ''){
			self::$args_query[$table]['columns'] = $columns;
		}

		if($conditions != ''){
			self::$args_query[$table]['conditions'] = $conditions;
		}

		if($values != ''){
			self::$args_query[$table]['conditions_in']['values'] = $values;
		}

		if($column_in != ''){
			self::$args_query[$table]['conditions_in']['column'] = $column_in;
		}
	}

	public static function queryAction ($table, $custom_args = '')
	{
		$columns 	= '';
		$conditions = '';

		// VERIFICAÇÃO DE ARGUMENTOS CUSTOMIZADOS
		if($custom_args != ''){
			$columns 	= ( isset($custom_args['columns']) ) ? $custom_args['columns'] : '' ;
			$conditions = ( isset($custom_args['conditions']) ) ? $custom_args['conditions'] : '' ;
		}

		// ATUALIZAR OS ARGUMENTOS
		self::defineArgs($table, $columns, $conditions);

		$result = [];

		$columns 	= self::$args_query[$table]['columns'];
		$conditions = self::$args_query[$table]['conditions'];

		$data =
			DB::table($table)
				->where($conditions)
				->get($columns);

		if (count($data) > 0) {
			$array_data = self::toArray($data);

			foreach ($array_data as $key_data => $data){
				$result[$data['id']] = $data;
			}
		}

		return $result;
	}

	public static function queryActionIn ($table, $custom_args = '')
	{
		$conditions = '';
		$columns 	= '';
		$values 	= '';
		$column_in 	= '';

		// VERIFICAÇÃO DE ARGUMENTOS CUSTOMIZADOS
		if($custom_args != ''){
			$columns 	= ( isset($custom_args['columns']) ) ? $custom_args['columns'] : '' ;
			$conditions = ( isset($custom_args['conditions']) ) ? $custom_args['conditions'] : '' ;
			$values 	= ( isset($custom_args['values']) ) ? $custom_args['values'] : '' ;
			$column_in 	= ( isset($custom_args['column']) ) ? $custom_args['column'] : '' ;
		}

		// ATUALIZAR OS ARGUMENTOS
		self::defineArgs($table, $columns, $conditions, $column_in, $values);

		$result = [];

		$columns 	 = self::$args_query[$table]['columns'];
		$column  	 = self::$args_query[$table]['conditions_in']['column'];
		$values 	 = self::$args_query[$table]['conditions_in']['values'];
		$conditions  = self::$args_query[$table]['conditions'];

		$data = DB::table($table)
						->whereIn($column, $values)
						->where($conditions)
						->get($columns);

		$array_data = self::toArray($data);

		foreach ($array_data as $key_data => $data){
			$result[$data['id']] = $data;
		}

		return $result;
	}

	private static function toArray ($object) {
		$accent_correction = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
		return json_decode(json_encode($object, $accent_correction), true);
	}

	public static function transaction ($type = '')
	{
		switch ($type) {
			case 'rollBack':
				return DB::rollBack();
				break;
			case 'commit':
				return DB::commit();
				break;
			default;
				return DB::beginTransaction();
			break;
		}
	}

	public static function getSampleData ($table, $column, $args = '')
	{
		$all_data = self::queryAction($table, $args);

		$sample_arr_data = [];

		foreach($all_data as $data_id => $data){
			$sample_arr_data[$data_id] = $data[$column];
		}

		return $sample_arr_data;
	}

}
