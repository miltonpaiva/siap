<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;

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

    public function actionRegister(Request $request)
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

        return redirect()->route('startup.register.view', ['startup_id' => $startup_id]);

    }

    public function actionLogin(Request $request)
    {
        $data = $request->all();

        $custom_args['columns'] =
            [
                'id',
                'email',
                'startup',
                'password'
            ];

        $custom_args['conditions'] =
            [
                ['email', '=', $data['login']]
            ];

        $data_user = Query::queryAction('users', $custom_args);

        if (count($data_user) > 0) {
            if(current($data_user)['password'] == md5($data['senhalogin'])){
                $user = current($data_user);
                return redirect()->route('startup.register.view', ['startup_id' => $user['startup']]);
            }else{
                // SENHA INCORRETA
                return redirect()->route('user.login.view');
            }
        }else{
            // USUARIO NÃO ENCONTRADO
            return redirect()->route('user.login.view');
        }
    }
}
