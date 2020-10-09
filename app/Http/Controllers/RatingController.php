<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;
use App\Http\Controllers\UsersController as User;

header("Access-Control-Allow-Origin: *");

class RatingController extends Controller
{

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

        $vars =
          [
              'ratings' => $data,
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
        foreach ($ratings as $r_id => $rating) {
            if (!in_array($rating['startup'], $sttps_ids)) {
                $sttps_ids[] = $rating['startup'];
            }

            if (!in_array($rating['evaluator'], $users_ids)) {
                $users_ids[] = $rating['evaluator'];
            }
        }

        $custom_args_users['values'] = $sttps_ids;

        $startups = Query::queryActionIn('startups', $custom_args_users);

        $custom_args_users['values'] = $users_ids;

        $users = Query::queryActionIn('users', $custom_args_users);

        foreach ($ratings as $r_id => $rating) {
            $key = "{$rating['evaluator']}_{$rating['startup']}";
            $data[$key] = $rating;
            $data[$key]['user'] = $users[$rating['evaluator']];
            $data[$key]['startup'] = $startups[$rating['startup']];
        }

        $vars =
          [
            'ratings' => $data,
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

      $result = Startup::update(['stage' => 'rated'], $startup_id);

      return redirect()->route('startup.list');
    }

    public static function update($id, $note)
    {
        $result =
            DB::table('rating')
                      ->where('id', $id)
                      ->update(['note' => $note]);

        return $result;
    }



    public static function registerRating($rating)
    {
        $new_rating_id =
            DB::table('rating')->insertGetId($rating);

        return $new_rating_id;
    }

}
