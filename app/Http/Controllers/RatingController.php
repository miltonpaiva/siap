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

    public function listRating()
    {

        $data = [];
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $usr_prf = $_SESSION['login']['user_profile'];

        if ($usr_prf == 'Avaliador') {
            return $this->getDataAvalaidor();
        }

        $ratings = Query::queryAction('rating');

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

        if ($_SESSION['login']['user_profile'] == 'Avaliador') {
            $custom_args['values'] = User::getLinkedStartups($_SESSION['login']['user_id']);
        }else{
            $custom_args['values'] = $sttps_ids;
        }

        $custom_args['conditions'] =
            [
                ['stage', '<>', 'reproved']
            ];

        $startups_avalied = Query::queryActionIn('startups', $custom_args);

        $custom_args['conditions'] =
            [
                ['stage', '=', 'complete']
            ];

        if ($_SESSION['login']['user_profile'] == 'Avaliador') {
            $custom_args['values'] = User::getLinkedStartups($_SESSION['login']['user_id']);

            $startups_unavalied = Query::queryActionIn('startups', $custom_args);

        }else{
            $startups_unavalied = Query::queryAction('startups', $custom_args);
        }

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

    public function getDataAvalaidor()
    {
        $usr_id = $_SESSION['login']['user_id'];
        $sttps_ids = [];
        $custom_args['values'] = User::getLinkedStartups($_SESSION['login']['user_id']);

        $custom_args['conditions'] =
            [
                ['stage', '<>', 'reproved']
            ];

        $startups = Query::queryActionIn('startups', $custom_args);

        $stts_valid =
            [
                // 'rated',
                // 'complete',
                'rated_attractive',
                'complete_attractive',
            ];

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
        if ($table == 'rating_attractive') {
            $stage = 'atratividade';
            $msg = "o Projeto [{$startup_id}] Avaliado com sucesso na etapa de Atratividade.";
            $stage_sttp = 'rated_attractive';
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

      return redirect()->route('rating.list');

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

        return redirect()->route('rating.list');
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

        return redirect()->route('rating.list');
    }
}
