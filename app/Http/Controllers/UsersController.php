<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;

header("Access-Control-Allow-Origin: *");

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

        $custom_args['conditions'] =
            [
                ['email', '=', $data['email']]
            ];

        $user_exist = count(Query::queryAction('users', $custom_args));

        if ($user_exist > 0) {
            return Redirect::back()->withErrors(['Esse email ja esta regsitrado, tente fazer login ou use outro']);
        }

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
        session_start();

        $data = $request->all();

        $custom_args['columns'] =
            [
                'id',
                'email',
                'name',
                'profile',
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

                if ($user['profile'] == 'Empreendedor') {
                    $custom_args['columns'] =
                        [
                            'id',
                            'stage',
                        ];

                    $custom_args['conditions'] =
                        [
                            ['id', '=', $user['startup']]
                        ];

                    $data_startup = current(Query::queryAction('startups', $custom_args));

                    if ($data_startup['stage'] == 'complete') {
                        return redirect()->route('concluido');
                    }
                    return redirect()->route('startup.register.view', ['startup_id' => $user['startup']]);
                }

                if ($user['profile'] == 'Gestor') {
                    $_SESSION['login'] =
                        [
                            'user_id'      => $user['id'],
                            'user_name'    => $user['name'],
                            'startup_id'   => $user['startup'],
                            'user_profile' => $user['profile'],
                        ];
                    return redirect()->route('painel');
                }
            }else{
                // SENHA INCORRETA
                return Redirect::back()->withErrors(['Senha incorreta !']);
            }
        }else{
            // USUARIO NÃO ENCONTRADO
            return Redirect::back()->withErrors(['esse usuario não foi encontrado, tente novamente ou faça um cadstro.']);
        }
    }

    public static function checkLogin()
    {
        session_start();

        if (!isset($_SESSION['login'])) {
            // NÃO LOGADO
            return redirect()->route('home');
        }
    }

    public function actionLogout()
    {
        session_start();

        session_destroy();
        return redirect()->route('user.login.view');
    }

    public function listUsers()
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $users = Query::queryAction('users');

        $vars =
        [
            'users' => $users,
        ];

        return view('paineladm/listagem_usuarios', $vars);
    }
}
