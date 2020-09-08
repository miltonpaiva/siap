<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class StartupsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public static function semiRegister($name)
    {
        $new_startup_id =
            DB::table('startups')->insertGetId(
                [
                    'name'      => $name,
                    'cod_state' => '000000',
                    'cod_city'  => '000000',
                    'category'  => 'criação',
                ]
            );

        return $new_startup_id;
    }

    public static function update($args, $id)
    {
        $args = array_filter($args);

        $result =
            DB::table('users')
                      ->where('id', $id)
                      ->update($args);

        return $result;
    }

    public function register(Request $request)
    {
      echo "<pre>";
      print_r($request->all());
      exit();
    }
}
