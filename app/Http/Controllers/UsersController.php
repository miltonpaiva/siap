<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\StartupsController as Startup;

class UsersController extends Controller
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

    public function register(Request $request)
    {
        $data = $request->all();

        $startup_id = Startup::semiRegister($data['startup']);

        $new_user_id =
            DB::table('users')->insertGetId(
                [
                    'name'     => $data['nome'],
                    'email'    => $data['email'],
                    'password' => md5($data['senha']),
                    'startup'  => $startup_id,
                    'profile'  => 'Empreendedor',
                ]
            );

        echo "<pre>";
        print_r($startup_id);
        print_r($new_user_id);
        exit();
    }
}
