<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

use Redirect;
use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;

header("Access-Control-Allow-Origin: *");

class UsersController extends Controller
{

    public function actionRegister(Request $request)
    {
        session_start();

        $data = $request->all();

        $custom_args['conditions'] =
            [
                ['email', '=', $data['email']]
            ];

        $user_exist = count(Query::queryAction('users', $custom_args));

        if ($user_exist > 0) {
            return Redirect::back()->withErrors(['Esse email ja está registrado, tente fazer login ou use outro.']);
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

            $_SESSION['login'] =
                [
                    'user_id'      => $new_user_id,
                    'user_name'    => $data['nome'],
                    'user_email'    => $data['email'],
                    'startup_id'   => $startup_id,
                    'user_profile' => 'Empreendedor',
                ];

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

                $_SESSION['login'] =
                    [
                        'user_id'      => $user['id'],
                        'user_name'    => $user['name'],
                        'user_email'    => $user['email'],
                        'startup_id'   => $user['startup'],
                        'user_profile' => $user['profile'],
                    ];

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

                    if ($data_startup['stage'] != 'in_progress') {
                        return redirect()->route('user.painel.view');
                    }
                    return redirect()->route('startup.register.view', ['startup_id' => $user['startup']]);
                }

                if ($user['profile'] != 'Empreendedor') {
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

        $routes_user =
            [
                'startup.view',
                'startup.register.view',
                'user.painel.view'
            ];

        if (!isset($_SESSION['login'])) {
            // NÃO LOGADO
            return redirect()->route('user.login.view')->withErrors(['Você precisa estar cadastrado ou logado para acessar a tela.']);
        }else{
            $route = Route::current()->getName();
            if ($_SESSION['login']['user_profile'] == 'Empreendedor') {
                if (!in_array($route, $routes_user)) {
                    return redirect()->route('user.painel.view')->withErrors(['Você não tem permissão para acessar a tela.']);
                }
            }
        }
    }

    public function actionLogout()
    {
        session_start();

        session_destroy();
        return redirect()->route('user.login.view');
    }

    public function actionList()
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

    public function viewAdd()
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        return view('paineladm/add_usuarios', []);
    }

    public function actionAdd(Request $request)
    {
        session_start();

        $data = $request->all();

        $custom_args['conditions'] =
            [
                ['email', '=', $data['email']]
            ];

        $user_exist = count(Query::queryAction('users', $custom_args));

        if ($user_exist > 0) {
            return Redirect::back()->withErrors(['Esse email ja está registrado, use outro.']);
        }

        try {
            $new_user_id =
                DB::table('users')->insertGetId(
                    [
                        'name'     => $data['nome'],
                        'email'    => $data['email'],
                        'password' => md5($data['senha']),
                        // 'startup'  => $startup_id,
                        'profile'  => $data['perfil'],
                    ]
                );
        } catch (\Exception $e) {
            Log::error("Não foi possivel inserir o usuario ", [$e->getMessage()]);

            return Redirect::back()->withErrors(["Não foi possivel inserir o usuario"]);
        }

        $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "o usuario [{$data['nome']}] foi criado.",
        ];



        return redirect()->route('user.list');
    }

    public function actionEdit($user_id, Request $request)
    {
        session_start();
        $data = $request->all();

        $custom_args['conditions'] =
            [
                ['email', '=', $data['email']]
            ];

        $user_exist = current(Query::queryAction('users', $custom_args));

        if (isset($user_exist['id']) && $user_exist['id'] != $user_id) {
            return Redirect::back()->withErrors(['Esse email ja está registrado.']);
        }

        $args =
            [
                'name'     => $data['nome'],
                'email'    => $data['email'],
                'profile'  => $data['perfil'],
            ];

        if ($data['senha'] != $user_exist['password']) {
            $args['password'] = md5($data['senha']);
        }

        try {
            DB::table('users')
                  ->where('id', $user_id)
                  ->update($args);
        } catch (\Exception $e) {
            Log::error("Não foi possivel editar o usuario ", [$e->getMessage()]);

            return Redirect::back()->withErrors(["Não foi possivel editar o usuario"]);
        }

        $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "o usuario [{$data['nome']}] foi editado.",
        ];

        return redirect()->route('user.list');
    }

    public function viewEdit($user_id)
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $custom_args['conditions'] =
            [
                ['id', '=', $user_id]
            ];

        $user = current(Query::queryAction('users', $custom_args));

        return view('paineladm/edit_usuarios', ['user' => $user]);
    }

    public function viewPainel()
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        return view('paineluser/index', []);
    }

    public function viewAttractive()
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $startup_id = $_SESSION['login']['startup_id'];

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];

        $startup = current(Query::queryAction('startups', $custom_args));

        $view =
            'paineluser/atratividade_' .
             self::clearString($startup['category']);
        return view($view, []);
    }
}
