<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use Redirect;
use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;
use App\Http\Controllers\FiltersController as Filters;
use App\Http\Controllers\UsersController as User;
use App\Mail\SendMailUser;

header("Access-Control-Allow-Origin: *");

class RatingController extends Controller
{
    public static $message;
    public $cities;

    public function viewRatingAction($startup_id)
    {
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];
        $startup = current(Query::queryAction('startups', $custom_args));

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];
        $user = current(Query::queryAction('users', $custom_args));

        $participants = Query::queryAction('participants', $custom_args);

        $vars =
          [
              'startup' => $startup,
              'user' => $user,
              'qtd_particpants' => count($participants)
          ];

        return view('paineladm/ratings/add', $vars);
    }

    public function viewRatingAttractive($startup_id)
    {
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];
        $startup = current(Query::queryAction('startups', $custom_args));

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];
        $user = current(Query::queryAction('users', $custom_args));

        $participants = Query::queryAction('participants', $custom_args);

        $vars =
          [
              'startup' => $startup,
              'user' => $user,
              'qtd_particpants' => count($participants)
          ];

        return view('paineladm/add_atratividade', $vars);
    }

    public function viewRating($startup_id, $user_id)
    {
        return self::dataRatingView('rating', $startup_id, $user_id);
    }

    public function viewgAttractiveRatin($startup_id, $user_id)
    {
        return self::dataRatingView('rating_attractive', $startup_id, $user_id);
    }

    public static function dataRatingView($table, $startup_id, $user_id)
    {

        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $data = [];

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];
        $startup = current(Query::queryAction('startups', $custom_args));

        $cities = self::getDataRegions()['cities'];
        $regions = self::getDataRegions()['all_regions'];

        $city = $startup['city'];
        $is_city =
            isset(
              $cities[self::clearString($city)]
            );
        if ($is_city) {
            $startup['region'] = $regions[$cities[self::clearString($city)]];
        }else{
            $startup['region'] = 'sem região';
        }

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];
        $user = current(Query::queryAction('users', $custom_args));

        $participants = Query::queryAction('participants', $custom_args);

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $user_id],
                ['startup', '=', $startup_id],
            ];

        $ratings = Query::queryAction($table, $custom_args);

        if (count($ratings) < 1) {
            return Redirect::back()->withErrors(["Não ha avaliação disponivel"]);
        }

        $stage = 'prontidão';
        $view = 'paineladm/ratings/view';
        if ($table == 'rating_attractive') {
            $stage = 'atratividade';
            $view = 'paineladm/attractive/view';
        }

        $custom_args['conditions'] =
            [
                ['stage', '=', $stage],
            ];

        $criterios = Query::queryAction('criterea', $custom_args);

        foreach ($ratings as $r_id => $rating) {
            if (isset($criterios[$rating['criterea']])) {
                $data[$r_id] = $rating;
                $data[$r_id]['criterio'] = $criterios[$rating['criterea']];
                $custom_args['conditions'] =
                    [
                        ['id', '=', $rating['evaluator']]
                    ];
            }
        }

        $user = current(Query::queryAction('users', $custom_args));

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $user['id']],
                ['startup', '=', $startup['id']],
                ['stage', '=', $stage],
            ];

        $comment = max(Query::queryAction('comments', $custom_args));

        $vars =
          [
              'ratings' => $data,
              'comment' => $comment,
              'evaluator' => $user,
              'startup' => $startup,
              'user' => $user,
              'qtd_particpants' => count($participants)
          ];

        return view($view, $vars);
    }

    public function listRating($type)
    {

        $data = [];
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $usr_prf = $_SESSION['login']['user_profile'];

        if ($usr_prf == 'Avaliador') {
            return $this->getDataAvalaidor($type);
        }

        $table = 'rating';
        if ($type == 'atratividade') {$table = 'rating_attractive';}

        $ratings = Query::queryAction($table);

        $sttps_ids = [];
        $users_ids = [];
        $notes = [];

        $this->cities = [];
        foreach ($ratings as $r_id => $rating) {
            if (!in_array($rating['startup'], $sttps_ids)) {
                $sttps_ids[] = $rating['startup'];
            }

            $key = "{$rating['evaluator']}_{$rating['startup']}";

            $notes[$key][$rating['criterea']] = $rating['note'];

            if (!in_array($rating['evaluator'], $users_ids)) {
                $users_ids[] = $rating['evaluator'];
            }
        }

        $custom_args['values'] = $sttps_ids;

        $startups_avalied = Query::queryActionIn('startups', $custom_args);

        $stage = 'complete';
        if ($type == 'atratividade') {$stage = 'complete_attractive';}

        $custom_args['conditions'] =
            [
                ['stage', '=', $stage]
            ];

        $startups_unavalied = Query::queryAction('startups', $custom_args);

        $startups = ($startups_avalied + $startups_unavalied);

        $set_tec = $this->getSetorTecnologia($sttps_ids);
        foreach ($startups as $s_id => $sttp) {

          @$startups[$s_id]['setor'] = @$set_tec[$s_id][3];
          @$startups[$s_id]['tecno'] = @$set_tec[$s_id][4];

          if ($sttp['city'] != '000000') {
            $this->cities[self::clearString($sttp['city'])] = $sttp['city'];
          }
          if (!in_array($s_id, $sttps_ids)) {
            $sttps_ids[] = $s_id;
          }
        }

        if (isset($_GET['regiao'])) {
          $startups = Filters::getFilterRegion($startups);
        }

        if (isset($_GET['cidade'])) {
          $startups = Filters::getFilterCity($startups);
        }

        if (isset($_GET['articulador'])) {
          $startups = Filters::getFilterArticulador($startups);
        }

        if (isset($_GET['tecnologia'])) {
          $startups = Filters::getFilterTecnologia($startups);
        }
        $custom_args_users['values'] = $users_ids;

        $users = Query::queryActionIn('users', $custom_args_users);

        $custom_args_participants['column'] = 'startup';
        $custom_args_participants['values'] = $sttps_ids;

        $participants = Query::queryActionIn('participants', $custom_args_participants);

        $prtc = [];
        foreach ($participants as $p) {
            $prtc[$p['startup']][$p['id']] = $p['id'];
        }

        $total = [];
        $ids   = [];

        $cities = self::getDataRegions()['cities'];
        $regions = self::getDataRegions()['all_regions'];

        foreach ($ratings as $r_id => $rating) {
            if (isset($startups[$rating['startup']])) {
                $key = "{$rating['evaluator']}_{$rating['startup']}";
                $total[$key] = (isset($total[$key])) ? $total[$key] : 0 ;

                $ids[] = $rating['startup'];

                $data[$key] = $rating;
                $data[$key]['user'] = $users[$rating['evaluator']];
                $data[$key]['startup'] = $startups[$rating['startup']];
                $data[$key]['total'] = $total[$key] += $rating['note'];

                if (isset($prtc[$rating['startup']])) {
                    $data[$key]['startup']['qtd_prtc'] = count($prtc[$rating['startup']]);
                }else{
                    $data[$key]['startup']['qtd_prtc'] = 0;
                }

                $city = $startups[$rating['startup']]['city'];
                $is_city =
                    isset(
                      $cities[self::clearString($city)]
                    );
                if ($is_city) {
                    $data[$key]['startup']['region'] = $regions[$cities[self::clearString($city)]];
                }else{
                    $data[$key]['startup']['region'] = 'sem região';
                }
            }
        }

        foreach ($startups as $id => $startup) {
            if (!in_array($id, $ids)) {
                $key = "0_{$id}";
                $total[$key] = 0 ;
                $data[$key]['user']['id'] = 0;
                $data[$key]['user']['name'] = 'Não avaliado';
                $data[$key]['startup'] = $startup;
                $data[$key]['total'] = $total[$key];

                if (isset($prtc[$id])) {
                    $data[$key]['startup']['qtd_prtc'] = count($prtc[$id]);
                }else{
                    $data[$key]['startup']['qtd_prtc'] = 0;
                }

                $city = $startup['city'];
                $is_city =
                    isset(
                      $cities[self::clearString($city)]
                    );
                if ($is_city) {
                    $data[$key]['startup']['region'] = $regions[$cities[self::clearString($city)]];
                }else{
                    $data[$key]['startup']['region'] = 'sem região';
                }
            }
        }

        $vars =
          [
            'all_regions' => $this->getDataRegions()['all_regions'],
            'articuladores'  => $this->getOptions(29),
            'tecnologias'  => $this->getOptions(4),
            'cities'  => $this->cities,
            'ratings' => $data,
            'notes' => $notes,
            'message'  => self::$message,
          ];

        return view('paineladm/ratings/list', $vars);
    }

    public function getDataAvalaidor($type)
    {
        $usr_id = $_SESSION['login']['user_id'];
        $sttps_ids = [];
        $custom_args['values'] = User::getLinkedStartups($_SESSION['login']['user_id']);

        $custom_args['conditions'] =
            [
                ['stage', '<>', 'reproved']
            ];

        $startups = Query::queryActionIn('startups', $custom_args);

        $custom_args['column'] = 'startup';

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $usr_id]
            ];

        $table = 'rating';
        if ($type == 'atratividade') {$table = 'rating_attractive';}

        $ratings = Query::queryActionIn($table, $custom_args);

        $s_ids = [];
        foreach ($ratings as $r_id => $rt) {
            $s_ids[$rt['startup']] = $rt['startup'];
        }

        $stts_valid =
            [
                'rated',
                'complete',
                'rated_attractive',
                'complete_attractive',
            ];

        if ($type == 'atratividade') {
            $stts_valid =
                [
                    'rated_attractive',
                    'complete_attractive',
                ];
        }

        $cities = self::getDataRegions()['cities'];
        $regions = self::getDataRegions()['all_regions'];

        foreach ($startups as $s_id => $sttp) {
            if (!in_array($sttp['stage'], $stts_valid)) {
                unset($startups[$s_id]);
            }
            if ($sttp['city'] != '000000') {
                $this->cities[self::clearString($sttp['city'])] = $sttp['city'];
            }
            if (!in_array($s_id, $sttps_ids)) {
                $sttps_ids[] = $s_id;
            }

            $city = $startups[$s_id]['city'];
            $is_city =
                isset(
                  $cities[self::clearString($city)]
                );
            if ($is_city) {
                $startups[$s_id]['region'] = $regions[$cities[self::clearString($city)]];
            }else{
                $startups[$s_id]['region'] = 'sem região';
            }

            if ($type == 'atratividade' && $sttp['stage'] == 'rated_attractive') {
                if (!in_array($s_id, $s_ids)) {
                    $startups[$s_id]['stage'] = 'complete_attractive';
                }
            }
            if ($sttp['stage'] == 'rated') {
                if (!in_array($s_id, $s_ids)) {
                    $startups[$s_id]['stage'] = 'complete';
                }
            }
        }

        if (isset($_GET['regiao'])) {
          $startups = Filters::getFilterRegion($startups);
        }

        if (isset($_GET['cidade'])) {
          $startups = Filters::getFilterCity($startups);
        }

        if (isset($_GET['articulador'])) {
          $startups = Filters::getFilterArticulador($startups);
        }

        if (isset($_GET['tecnologia'])) {
          $startups = Filters::getFilterTecnologia($startups);
        }

        $custom_args_participants['column'] = 'startup';
        $custom_args_participants['values'] = $sttps_ids;

        $participants = Query::queryActionIn('participants', $custom_args_participants);

        $prtc = [];
        foreach ($participants as $p) {
            $prtc[$p['startup']][$p['id']] = $p['id'];
        }

        $ids   = [];

        $cities = self::getDataRegions()['cities'];
        $regions = self::getDataRegions()['all_regions'];
        $set_tec = $this->getSetorTecnologia($sttps_ids);

        foreach ($startups as $id => $startup) {
            if (!in_array($id, $ids)) {
                $key = "{$usr_id}_{$id}";
                $data[$key]['user']['id'] = $usr_id;
                $data[$key]['user']['name'] = 'Não avaliado';
                $data[$key]['startup'] = $startup;

                $data[$key]['startup']['setor'] = $set_tec[$id][3];
                $data[$key]['startup']['tecno'] = $set_tec[$id][4];

                if (isset($prtc[$id])) {
                    $data[$key]['startup']['qtd_prtc'] = count($prtc[$id]);
                }else{
                    $data[$key]['startup']['qtd_prtc'] = 0;
                }
            }
        }

        $vars =
          [
            'all_regions' => $this->getDataRegions()['all_regions'],
            'articuladores'  => $this->getOptions(29),
            'tecnologias'  => $this->getOptions(4),
            'cities'  => $this->cities,
            'ratings' => $data,
            'message'  => self::$message,
          ];

        return view('paineladm/ratings/list', $vars);
    }

    public function actionRating(Request $request)
    {
        $data = $request->all();

        return self::rating($data, 'rating');
    }

    public function actionRatingAttractive(Request $request)
    {
        $data = $request->all();

        return self::rating($data, 'rating_attractive');
    }

    public static function rating($data, $table)
    {

      session_start();
      $evaluator = $_SESSION['login']['user_id'];

      $criterios  = $data['avalicacao']['criterio'];

      $startup_id = $data['startup'];

      $result_attr = [];
      foreach ($criterios as $c_id => $value) {
        $rating_attr =
          [
            'evaluator' => $evaluator,
            'startup' => $startup_id,
            'criterea' => $c_id,
            'note' => $value['nota'],
          ];

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $evaluator],
                ['startup', '=', $startup_id],
                ['criterea', '=', $c_id],
            ];

        $has_rating = @max(Query::getSampleData($table, 'id', $custom_args));

        if ($has_rating) {
          $result = self::update($table, $has_rating, $value['nota']);
          if (is_object($result)) {
              return $result;
          }
          $result_attr[] = $result;
        }else{
          $result = self::registerRating($table, $rating_attr);
          if (is_object($result)) {
              return $result;
          }
          $result_attr[] = $result;
        }
      }

        $stage = 'prontidão';
        $stage_sttp = 'rated';
        $msg = "o Projeto [{$startup_id}] Avaliado com sucesso na etapa de Prontidão.";
        $route = 'prontidao';
        if ($table == 'rating_attractive') {
            $stage = 'atratividade';
            $msg = "o Projeto [{$startup_id}] Avaliado com sucesso na etapa de Atratividade.";
            $stage_sttp = 'rated_attractive';
            $route = 'attractive';
        }

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $evaluator],
                ['startup', '=', $startup_id],
                ['stage', '=', $stage],
            ];

        $has_comment = Query::queryAction('comments', $custom_args);

        $comment_data =
            [
                'evaluator' => $evaluator,
                'startup' => $startup_id,
                'comment' => $data['observacoes'],
                'stage' => $stage,
            ];

        if (count($has_comment) > 0) {
          $result = self::updateComment(current($has_comment)['id'], $data['observacoes']);
          if (is_object($result)) {
              return $result;
          }
        }else{
            $result = 0;
            if ($data['observacoes'] != '') {
                $result = self::registerComment($comment_data);
                if (is_object($result)) {
                    return $result;
                }
            }
        }

      $result = Startup::update(['stage' => $stage_sttp], $startup_id);

      $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => $msg,
        ];

      return redirect()->route('rating.list', $route);

    }

    public static function update($table, $id, $note)
    {
        $result =
            DB::table($table)
                      ->where('id', $id)
                      ->update(['note' => $note]);

        return $result;
    }

    public static function updateComment($id, $comment)
    {
        $result =
            DB::table('comments')
                      ->where('id', $id)
                      ->update(['comment' => $comment]);

        return $result;
    }

    public static function registerRating($table, $rating)
    {
        $new_rating_id =
            DB::table($table)->insertGetId($rating);

        return $new_rating_id;
    }

    public static function registerComment($comment)
    {
        $new_comment_id =
            DB::table('comments')->insertGetId($comment);

        return $new_comment_id;
    }

    public function actionAprov($startup_id)
    {
        session_start();

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];
        $startup = current(Query::queryAction('startups', $custom_args));

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];
        $user = current(Query::queryAction('users', $custom_args));

        $data =
            [
                'startup' => $startup,
                'user' => $user,
            ];

        try {
            Mail::to($user['email'])->send(new SendMailUser($data));
            $result = Startup::update(['stage' => 'approved'], $startup_id);
        } catch (\Exception $e) {
            Log::error("Não foi possivel fazer a aprovação da startup [{$startup['name']}] pois houve um erro no envio do email.", [$e->getMessage()]);

            return Redirect::back()->withErrors(["Não foi possivel fazer a aprovação da startup [{$startup['name']}] pois houve um erro no envio do email."]);
        }

      $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "o Projeto [{$startup['name']}] habilitado para a etapa de Atratividade.",
        ];

        return redirect()->route('rating.list', 'prontidao');
    }

    public function actionReprov($startup_id)
    {
        session_start();

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];

        $startup = current(Query::queryAction('startups', $custom_args));

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];

        try {

            $result = Startup::update(['stage' => 'reproved'], $startup_id);
            $_SESSION['message'] =
                [
                    'type' => 'success',
                    'message' => "o Projeto [{$startup_id}] reprovado na etapa de Prontidão.",
                ];
        } catch (\Exception $e) {
            Log::error("Não foi possivel fazer a reprovação da startup [{$startup['name']}] .", [$e->getMessage()]);
            return Redirect::back()->withErrors(["Não foi possivel fazer a reprovação da startup [{$startup['name']}]."]);
        }

        return redirect()->route('rating.list', 'prontidao');
    }

    public function getCsvRatings($type)
    {

        $ratings = Query::queryAction('rating_attractive');

        $sttps_ids = [];
        $users_ids = [];
        $notes = [];

        $this->cities = [];
        foreach ($ratings as $r_id => $rating) {
            if (!in_array($rating['startup'], $sttps_ids)) {
                $sttps_ids[] = $rating['startup'];
            }

            $key = "{$rating['evaluator']}_{$rating['startup']}";

            $notes[$key][$rating['criterea']] = $rating['note'];

            if (!in_array($rating['evaluator'], $users_ids)) {
                $users_ids[] = $rating['evaluator'];
            }
        }

        $custom_args['values'] = $sttps_ids;

        $startups_avalied = Query::queryActionIn('startups', $custom_args);

        $questions_attr =
        [
            14,
            15,
            16,
            17,
        ];
        // $questions_attr =
        // [
        // 18,
        // 19,
        // 20,
        // 21,
        // 22,
        // 23,
        // 24,
        // 25,
        // 26,
        // 27,
        // 28,
        // 29,
        // 30,
        // ];
        $custom_args['column'] = 'question';
        $custom_args['values'] = $questions_attr;
        $responses_att = Query::queryActionIn('attractive', $custom_args);

        $custom_args['conditions'] =
            [
                ['stage', '=', 'complete_attractive']
            ];

        $startups_unavalied = Query::queryAction('startups', $custom_args);

        $startups = ($startups_avalied + $startups_unavalied);

        $set_tec = $this->getSetorTecnologia($sttps_ids);
        foreach ($startups as $s_id => $sttp) {

          @$startups[$s_id]['setor'] = @$set_tec[$s_id][3];
          @$startups[$s_id]['tecno'] = @$set_tec[$s_id][4];
          $startups[$s_id]['stage'] = self::$arr_status[$sttp['stage']];

          if ($sttp['city'] != '000000') {
            $this->cities[self::clearString($sttp['city'])] = $sttp['city'];
          }
          if (!in_array($s_id, $sttps_ids)) {
            $sttps_ids[] = $s_id;
          }
        }

        foreach ($responses_att as $rsp) {
            $algo[$rsp['startup']][$rsp['question']] = $rsp['response'];
        }

        foreach ($startups as $s_id => $sttp) {
            @$startups[$s_id]['attr'] = implode(';', @$algo[$s_id]);
        }

        $custom_args_users['values'] = $users_ids;

        $users = Query::queryActionIn('users', $custom_args_users);

        $custom_args_participants['column'] = 'startup';
        $custom_args_participants['values'] = $sttps_ids;

        $participants = Query::queryActionIn('participants', $custom_args_participants);

        $prtc = [];
        foreach ($participants as $p) {
            $prtc[$p['startup']][$p['id']] = $p['id'];
        }

        $total = [];
        $ids   = [];

        $cities = self::getDataRegions()['cities'];
        $regions = self::getDataRegions()['all_regions'];

        foreach ($ratings as $r_id => $rating) {
            if (isset($startups[$rating['startup']])) {
                $key = "{$rating['evaluator']}_{$rating['startup']}";
                $total[$key] = (isset($total[$key])) ? $total[$key] : 0 ;

                $ids[] = $rating['startup'];

                if ($rating['criterea'] == 13) {
                    $startups[$rating['startup']]['clusters'] = $rating['note'];
                }

                $data[$key] = $rating;
                $data[$key]['user'] = $users[$rating['evaluator']];
                $data[$key]['startup'] = $startups[$rating['startup']];
                $data[$key]['total'] = $total[$key] += $rating['note'];

                if (isset($prtc[$rating['startup']])) {
                    $data[$key]['startup']['qtd_prtc'] = count($prtc[$rating['startup']]);
                }else{
                    $data[$key]['startup']['qtd_prtc'] = 0;
                }

                $city = $startups[$rating['startup']]['city'];
                $is_city =
                    isset(
                      $cities[self::clearString($city)]
                    );
                if ($is_city) {
                    $data[$key]['startup']['region'] = $regions[$cities[self::clearString($city)]];
                }else{
                    $data[$key]['startup']['region'] = ' --- ';
                }
            }
        }

        foreach ($startups as $id => $startup) {
            if (!in_array($id, $ids)) {
                $key = "0_{$id}";
                $total[$key] = 0 ;
                $data[$key]['user']['id'] = 0;
                $data[$key]['user']['name'] = 'Não avaliado';
                $data[$key]['startup'] = $startup;
                $data[$key]['total'] = $total[$key];

                if (isset($prtc[$id])) {
                    $data[$key]['startup']['qtd_prtc'] = count($prtc[$id]);
                }else{
                    $data[$key]['startup']['qtd_prtc'] = 0;
                }

                $city = $startup['city'];
                $is_city =
                    isset(
                      $cities[self::clearString($city)]
                    );
                if ($is_city) {
                    $data[$key]['startup']['region'] = $regions[$cities[self::clearString($city)]];
                }else{
                    $data[$key]['startup']['region'] = ' --- ';
                }
            }
        }

        $add = "INOVAÇÃO DE VALOR;DESCRIÇÃO DO PROBLEMA;DESCRIÇÃO DA SOLUÇÃO;DESCRIÇÃO DA VANTAGEM COMPETITIVA;";
        // $add = "QUAL É O PROBLEMA?;QUAIS EVIDÊNCIAS SUSTENTAM QUE O PROBLEMA EXISTE?;O PROBLEMA É URGENTE, MAL ATENDIDO, IMPRATICÁVEL E/OU INEVITÁVEL?;O PROBLEMA É VISÍVEL E/OU CRÍTICO?;QUEM É O CLIENTE-ALVO?;QUAIS SÃO AS NECESSIDADES E DESEJOS DELES?;QUAL É O TAMANHO DO MERCADO?;QUAIS GANHOS OS CLIENTES EXPERIMENTARÃO?;QUE DORES OS CLIENTES EXPERIMENTARÃO?;QUEM SÃO OS CONCORRENTES E SEUS CLIENTES?;QUAIS SÃO OS SEUS RECURSOS MÍNIMOS VIÁVEIS?;POR QUE ESSES RECURSOS SÃO VALIOSOS E RAROS?;QUAL É O SEU PROTÓTIPO?";

        $lines[] = "ID;STARTUP;CATEGORIA;REGIÃO;CIDADE;SETOR;TECNOLOGIA;NOTA CLUSTERS;{$add}\n";
        foreach ($data as $id => $d) {
            $str =
"{$d['startup']['id']};
{$d['startup']['name']};
{$d['startup']['category']};
{$d['startup']['region']};
{$d['startup']['city']};
" . str_replace(';', '', $d['startup']['tecno']) . ";
" . str_replace(';', '', $d['startup']['setor']) . ";
{$d['startup']['clusters']};
{$d['startup']['attr']}
";
            if ($d['startup']['attr'] != '') {
                $lines[] = preg_replace( "/\r|\n/", "", $str) . " \n";
            }
        }

        $path_root = $_SERVER["DOCUMENT_ROOT"] . '/';
        $uploaddir = "{$path_root}/files/ratings_attractive.txt";

        if (is_file($uploaddir)) {
            @unlink($uploaddir);
        }

        foreach ($lines as $line) {
            $result[] = @file_put_contents($uploaddir, $line, FILE_APPEND);
        }

        echo json_encode(['status' => 200, 'message' => 'arquivo gerado']);
        exit();

    }
}
