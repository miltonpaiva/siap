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

        return view('paineladm/avaliacao', $vars);
    }

    public function viewRating($startup_id, $user_id)
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

        $ratings = Query::queryAction('rating', $custom_args);

        $criterios = Query::queryAction('criterea');

        foreach ($ratings as $r_id => $rating) {
            $data[$r_id] = $rating;
            $data[$r_id]['criterio'] = $criterios[$rating['criterea']];

            $custom_args['conditions'] =
                [
                    ['id', '=', $rating['evaluator']]
                ];
        }

        $user = current(Query::queryAction('users', $custom_args));

        $custom_args['conditions'] =
            [
                ['evaluator', '=', $user['id']],
                ['startup', '=', $startup['id']],
            ];

        $comment = current(Query::queryAction('comments', $custom_args));

        $vars =
          [
              'ratings' => $data,
              'comment' => $comment,
              'evaluator' => $user,
              'startup' => $startup,
              'user' => $user,
              'qtd_particpants' => count($participants)
          ];

        return view('paineladm/avaliacao_view', $vars);
    }

    public function listRating()
    {

        $data = [];
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
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

        foreach ($startups as $s_id => $sttp) {
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

        return view('paineladm/listagem_avaliacao', $vars);
    }

    public function actionRating(Request $request)
    {
      session_start();
      $evaluator = $_SESSION['login']['user_id'];
      $data = $request->all();

      $criterios  = $data['avalicacao']['criterio'];

      $startup_id = $data['startup'];

      foreach ($criterios as $c_id => $value) {
        $rating =
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

        $has_rating = @max(Query::getSampleData('rating', 'id', $custom_args));

        if ($has_rating) {
          $result = self::update($has_rating, $value['nota']);
        }else{
          $result = self::registerRating($rating);
        }
      }
        $custom_args['conditions'] =
            [
                ['evaluator', '=', $evaluator],
                ['startup', '=', $startup_id],
            ];

        $has_comment = Query::queryAction('comments', $custom_args);

        $comment_data =
            [
                'evaluator' => $evaluator,
                'startup' => $startup_id,
                'comment' => $data['observacoes'],
            ];

        if (count($has_comment) > 0) {
          $result = self::updateComment(current($has_comment)['id'], $data['observacoes']);
        }else{
          $result = self::registerComment($comment_data);
        }

      $result = Startup::update(['stage' => 'rated'], $startup_id);

      $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "o Projeto [{$startup_id}] Avaliado com sucesso na etapa de Prontidão.",
        ];

      return redirect()->route('rating.list');
    }

    public static function update($id, $note)
    {
        $result =
            DB::table('rating')
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

    public static function registerRating($rating)
    {
        $new_rating_id =
            DB::table('rating')->insertGetId($rating);

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
