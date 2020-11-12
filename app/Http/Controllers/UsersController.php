<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use Redirect;
use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;
use App\Mail\SendMailUser;

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
                        'user_email'   => $user['email'],
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

                if ($user['profile'] == 'Avaliador') {
                    return redirect()->route('rating.list');
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

        $routes_user['Empreendedor'] =
            [
                'startup.view',
                'startup.register.view',
                'user.painel.view',
                'user.attractive.view',
                'attractive.response.view',
            ];

        $routes_user['Avaliador'] =
            [
                'startup.view',
                'attractive.response.view',
                'rating.list',
                'startup.rating.view',
                'startup.rating.view.action',
                'startup.rating.attractive.view',
                'attractive.rating.view',
            ];

        if (!isset($_SESSION['login'])) {
            // NÃO LOGADO
            return redirect()->route('user.login.view')->withErrors(['Você precisa estar cadastrado ou logado para acessar a tela.']);
        }else{
            $route = Route::current()->getName();
            if ($_SESSION['login']['user_profile'] == 'Empreendedor') {
                if (!in_array($route, $routes_user['Empreendedor'])) {
                    return redirect()->route('user.painel.view')->withErrors(['Você não tem permissão para acessar a tela.']);
                }
            }
            if ($_SESSION['login']['user_profile'] == 'Avaliador') {
                if (!in_array($route, $routes_user['Avaliador'])) {
                    return redirect()->route('rating.list')->withErrors(['Você não tem permissão para acessar a tela.']);
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

        return view('paineladm/users/list', $vars);
    }

    public function viewAdd()
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $custom_args['conditions'] =
            [
                ['stage', '<>', 'in_progress'],
                ['stage', '<>', 'reproved'],
            ];

        $startups = Query::queryAction('startups', $custom_args);

        $sttps_ids = [];
        foreach ($startups as $id => $sttp) {
            $sttps_ids[$id] = $id;
        }

        $set_tec = $this->getSetorTecnologia($sttps_ids);

        $custom_args['conditions'] =
            [
                ['profile', '=', 'Avaliador'],
            ];

        $users = Query::getSampleData('users', 'name', $custom_args);

        $links = Query::queryAction('user_Link_startups');

        $lnk_p_sttp = [];
        foreach ($links as $lnk) {
            $lnk_p_sttp[$lnk['startup']][$lnk['evaluator']] = $users[$lnk['evaluator']];

            $startups[$lnk['startup']]['setor'] = $set_tec[$lnk['startup']][3];
            $startups[$lnk['startup']]['tecno'] = $set_tec[$lnk['startup']][4];
        }

        $vars =
            [
                'startups' => $startups,
                'links'    => $lnk_p_sttp,
            ];

        return view('paineladm/users/add', $vars);
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

        Query::transaction();

        $user =
            [
                'name'     => $data['nome'],
                'email'    => $data['email'],
                'password' => md5($data['senha']),
                'profile'  => $data['perfil'],
            ];

        try {
            $new_user_id =
                DB::table('users')->insertGetId($user);
        } catch (\Exception $e) {
            Log::error("Não foi possivel inserir o usuario ", [$e->getMessage()]);

            return Redirect::back()->withErrors(["Não foi possivel inserir o usuario"]);
        }

        $links = self::addAndUpEvaluator($new_user_id, $data['startups']);
        if (is_object($links)) {
            Query::transaction('rollBack');
            return $links;
        }

        $user['password'] = $data['senha'];

        $data_mail =
            [
                'user' => $user,
            ];

        Mail::to($user['email'])->send(new SendMailUser($data_mail));

        $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "o usuario [{$data['nome']}] foi criado.",
        ];

        Query::transaction('commit');

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

        Query::transaction();

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

        $links = self::addAndUpEvaluator($user_id, $data['startups']);
        if (is_object($links)) {
            Query::transaction('rollBack');
            return $links;
        }

        $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "o usuario [{$data['nome']}] foi editado.",
        ];

        Query::transaction('commit');

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
                ['profile', '=', 'Avaliador'],
            ];

        $users = Query::getSampleData('users', 'name', $custom_args);

        $links = Query::queryAction('user_Link_startups');

        $lnk_p_sttp = [];
        $sttps_ids = [];
        foreach ($links as $lnk) {
            $lnk_p_sttp[$lnk['startup']][$lnk['evaluator']] = $users[$lnk['evaluator']];
            $sttps_ids[$lnk['startup']] = $lnk['startup'];
        }

        $set_tec = $this->getSetorTecnologia($sttps_ids);

        $custom_args['conditions'] =
            [
                ['id', '=', $user_id]
            ];

        $user = current(Query::queryAction('users', $custom_args));

        $ratings = self::getLinkedStartups($user_id);

        $custom_args['conditions'] =
            [
                ['stage', '<>', 'in_progress'],
                ['stage', '<>', 'reproved'],
            ];

        $startups = Query::queryAction('startups', $custom_args);

        foreach ($startups as $s_id => $sttp) {
            if (in_array($s_id, $ratings)) {
                $startups[$s_id]['checked'] = 'checked';
            }

            $startups[$s_id]['setor'] = $set_tec[$s_id][3];
            $startups[$s_id]['tecno'] = $set_tec[$s_id][4];
        }

        $vars =
            [
                'user' => $user,
                'startups' => $startups,
                'links' => $lnk_p_sttp,
            ];

        return view('paineladm/users/edit', $vars);
    }

    public static function getLinkedStartups($user_id)
    {

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $user_id],
                ['criterea', '=', '1'],
            ];

        $ratings = Query::getSampleData('rating', 'startup', $custom_args);

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $user_id],
            ];

        $links = Query::getSampleData('user_Link_startups', 'startup', $custom_args);

        $startups = ($links + $ratings);

        return $startups;
    }

    public static function addAndUpEvaluator($id_user, $arr_startups)
    {
        $arr_new_link_id = [];
        $args =
            [
                ['evaluator', '=', $id_user],
            ];

        try {
            DB::table('user_Link_startups')->where($args)->delete();

            foreach ($arr_startups as $s_id) {
                $arr_new_link_id[] =
                    DB::table('user_Link_startups')->insertGetId(
                        [
                            'evaluator'=> $id_user,
                            'startup'  => $s_id,
                        ]
                    );
            }
        } catch (\Exception $e) {
            Log::error("Não foi possivel vincular alguma startup ao usuario [{$id_user}]", [$e->getMessage()]);

            return Redirect::back()->withErrors(["Não foi possivel vincular alguma startup ao usuario [{$id_user}]"]);
        }

        return $arr_new_link_id;
    }

    public function viewPainel()
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

        $is_criacao = ($startup['category'] == 'criação');

        $url_curso =
            ($is_criacao) ? 
            'https://corredoresdigitais.teachable.com/p/curso-preparatorio-criacao-de-negocios' :
            'https://corredoresdigitais.teachable.com/p/curso-preparatorio-tracao-de-negocios' ;

        $vars =
            [
                'startup'   => $startup,
                'url_curso' => $url_curso,
            ];

        return view('paineluser/index', $vars);
    }

    public function viewAttractive()
    {
        $user_logged = self::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $startup_id = $_SESSION['login']['startup_id'];

        $custom_args['column'] = 'question';
        $custom_args['values'] = [3,4,5];

        $options = Query::queryActionIn('options', $custom_args);

        $opt_agroup = [];
        foreach ($options as $o_id => $opt) {
            $opt_agroup[$opt['question']][$o_id] = $opt;
        }

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];

        $responses = Query::queryActionIn('responses', $custom_args);

        $participants = Query::queryAction('participants', $custom_args);

        $resp_agroup = [];
        foreach ($responses as $r_id => $resp) {
            $resp_agroup[$resp['question']] = $resp;
        }

        $attractives = Query::queryAction('attractive', $custom_args);

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id],
                ['participant', '<>', NULL]
            ];

        $attachments = Query::queryAction('attachments', $custom_args);

        $att_agroup = [];
        foreach ($attachments as $a_id => $att) {
            $att_agroup[$att['participant']] = $att;
        }

        $attrs = [];
        foreach ($attractives as $a_id => $attr) {
            $attrs[$attr['question']] = $attr;
        }

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];

        $startup = current(Query::queryAction('startups', $custom_args));

        $startup['time'] = $participants;

        $vars =
            [
                'attrs'     => $attrs,
                'responses' => $resp_agroup,
                'options'   => $opt_agroup,
                'startup'   => $startup,
                'attch'     => $att_agroup,
            ];

        $view =
            'paineluser/atratividade_' .
             self::clearString($startup['category']);
        return view($view, $vars);
    }
}
