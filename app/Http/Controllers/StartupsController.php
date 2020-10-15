<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Redirect;
use DB;

use App\Http\Controllers\ResponsesController as Response;
use App\Http\Controllers\QueryActionController as Query;
use App\Http\Controllers\FiltersController as Filters;
use App\Http\Controllers\UsersController as User;

header("Access-Control-Allow-Origin: *");

class StartupsController extends Controller
{
    public static $message;
    public $cities;

    public static function semiRegister($name)
    {
        $new_startup_id =
            DB::table('startups')->insertGetId(
                [
                    'name'     => $name,
                    'state'    => '000000',
                    'city'     => '000000',
                    'category' => 'criação',
                ]
            );

        return $new_startup_id;
    }

    public static function update($args, $id)
    {
        $args = array_filter($args);

        $result =
            DB::table('startups')
                      ->where('id', $id)
                      ->update($args);

        return $result;
    }

    public function viewRegister($startup_id)
    {

        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $questions = Response::questionsList('array');

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];

        $responses = Query::queryAction('responses', $custom_args);

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];

        $startup = current(Query::queryAction('startups', $custom_args));

        $responses_agrouped = [];
        foreach ($responses as $resp) {
           $responses_agrouped[$resp['question']]['option']   = $resp['option'];
           $responses_agrouped[$resp['question']]['response'] = $resp['id'];
        }

        $vars =
          [
              'questions'   => $questions,
              'startup_id'  => $startup_id,
              'responses'   => $responses_agrouped,
              'startup'     => $startup,
              'participant' => [],
          ];

        if ($startup['stage'] == 'complete') {
            return redirect()->route('concluido');
        }

        return view('inscricao', $vars);
    }

    public function viewStartup($startup_id)
    {

        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $questions = Response::questionsList('array');

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];

        $responses = Query::queryAction('responses', $custom_args);

        $user = current(Query::queryAction('users', $custom_args));

        $participants = Query::queryAction('participants', $custom_args);

        $attachments = Query::queryAction('attachments', $custom_args);

        $arquivos = [];
        foreach ($attachments as $att) {
          if ($att['participant'] != '') {
            $arquivos[$att['participant']] = $att['archive'];
          }else{
            $arquivos[$att['type']] = $att['archive'];
          }
        }

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id]
            ];

        $startup = current(Query::queryAction('startups', $custom_args));

        $startup['user'] = $user;

        $responses_agrouped = [];
        foreach ($responses as $resp) {
           $responses_agrouped[$resp['question']] = $resp['option'];
        }

        $vars =
          [
              'startup_id'  => $startup_id,
              'startup'     => $startup,
              'responses'   => $responses_agrouped,
              'arquivos'    => $arquivos,
              'participants' => $participants,
              'questions'   => $questions,
          ];

        return view('paineladm/projeto', $vars);
    }

    public function actionUpdate($startup_id, $state, $city, $category)
    {
        $startup_args['state']     = $state;
        $startup_args['city']      = $city;
        $startup_args['category']  = $category;

        $result = self::update($startup_args, $startup_id);

        echo json_encode(['status' => 200, 'message' => $result]);
        exit();
    }

    public function actionRegister(Request $request)
    {
      Query::transaction();

      $responses = $request->all();
      $attachments = [];

      $startup_id = $responses['session'][1]['startup_id'];

      $path_root = $_SERVER["DOCUMENT_ROOT"] . '/';
      $uploaddir = "{$path_root}/files/" . $startup_id . '/';

      $dir_exist = is_dir($uploaddir);
      if (!$dir_exist) {
        $dir_exist = mkdir($uploaddir, 0777, true);
      }

      $list_responses = [];

      if (isset($responses['time'])) {

        foreach ($responses['time'] as $time) {

            $uploaded = false;

            if (isset($time['comprovacao'])) {
              $has_archive = is_object($time['comprovacao']);

              if ($has_archive) {
                try {
                  $file_name = $time['comprovacao']->getClientOriginalName();
                  $temp_name = $time['comprovacao']->getPathName();
                  $uploadfile = $uploaddir . basename($file_name);
                  $uploaded = move_uploaded_file($temp_name, $uploadfile);
                } catch (\Exception $e) {

                    Query::transaction('rollBack');
                    return Redirect::back()->withErrors(['Não foi fazer upload da comprovacao.']);
                }
              }
            }

            if ($uploaded) {

                $participant =
                  [
                    'name' => $time['nome'],
                    'function' => $time['funcao'],
                    'startup' => $startup_id,
                    'rg' => $time['rg'],
                    'cpf' => $time['cpf'],
                    'institution' => $time['instensino'],
                    'course' => $time['curso'],
                    'formation' => $time['formacao'],
                    'address' => $time['logradouro'],
                    'city' => @$time['cidade'],
                    'data_nasc' => @$time['datanasc'],
                    'telephone' => $time['telcontato'],
                    'email' => $time['emailmenbro'],
                    'linkedin' => $time['linkedin'],
                  ];

                $partcipat_saved[] =
                  $id_partcipat = self::registerParticipant($participant);

                  if (!$id_partcipat) {

                    Query::transaction('rollBack');
                    return Redirect::back()->withErrors(["Não foi possivel criar o participante [{$time['nome']}] ."]);
                  }

                $attachments[] =
                  [
                    'archive' => $file_name,
                    'type' => 'experiencia',
                    'startup' => $startup_id,
                    'participant' => $id_partcipat,
                  ];
            }else{

              Query::transaction('rollBack');
              return Redirect::back()->withErrors(["Não foi possivel criar o participante [{$time['nome']}], sem comprovação"]);
            }
        }

      }

      if (isset($responses['session'][7])) {

        $anexos = $responses['session'][7]['anexos'];

        foreach ($anexos as $type => $anexo) {

            $has_archive = is_object($anexo);

            if ($has_archive) {
              $file_name = $anexo->getClientOriginalName();
              $temp_name = $anexo->getPathName();

              $uploadfile = $uploaddir . basename($file_name);
            }

            if ($has_archive && move_uploaded_file($temp_name, $uploadfile)) {

                $attachments[] =
                  [
                    'archive' => $file_name,
                    'type' => $type,
                    'startup' => $startup_id,
                  ];

            }else{

              Query::transaction('rollBack');
              return Redirect::back()->withErrors(["Não foi fazer upload do arquivo de {$type} [{$file_name}]."]);
            }
        }

      }

      $attachments_saved = [];
      foreach ($attachments as $attachment) {
        $result = self::registerAttachment($attachment);
        if (!$result) {

          Query::transaction('rollBack');
          return Redirect::back()->withErrors(["Não foi fazer guardar o arquivo [{$attachment['archive']}]."]);
        }
        $attachments_saved[] = $result;
      }

      $result = self::update(['stage' => 'complete'], $startup_id);

      Query::transaction('commit');
      return redirect()->route('concluido');
    }

    public static function registerParticipant($participant)
    {
      try {
        $new_participant_id =
            DB::table('participants')->insertGetId($participant);

        return $new_participant_id;
      } catch (\Exception $e) {
        return false;
      }
    }

    public static function registerAttachment($attachment)
    {
      try {
        $new_attachment_id =
            DB::table('attachments')->insertGetId($attachment);

        return $new_attachment_id;
      } catch (\Exception $e) {
        return false;
      }
    }

    public function viewPainel()
    {
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $startups = Query::queryAction('startups');
        $total_sttps = count($startups);
        $valid_startups = [];

        $states = json_decode('{"GO":{"id":5,"sigla":"CO","nome":"Centro-Oeste"},"MG":{"id":3,"sigla":"SE","nome":"Sudeste"},"PA":{"id":1,"sigla":"N","nome":"Norte"},"CE":{"id":2,"sigla":"NE","nome":"Nordeste"},"BA":{"id":2,"sigla":"NE","nome":"Nordeste"},"PR":{"id":4,"sigla":"S","nome":"Sul"},"SC":{"id":4,"sigla":"S","nome":"Sul"},"PE":{"id":2,"sigla":"NE","nome":"Nordeste"},"TO":{"id":1,"sigla":"N","nome":"Norte"},"MA":{"id":2,"sigla":"NE","nome":"Nordeste"},"RN":{"id":2,"sigla":"NE","nome":"Nordeste"},"PI":{"id":2,"sigla":"NE","nome":"Nordeste"},"RS":{"id":4,"sigla":"S","nome":"Sul"},"MT":{"id":5,"sigla":"CO","nome":"Centro-Oeste"},"AC":{"id":1,"sigla":"N","nome":"Norte"},"SP":{"id":3,"sigla":"SE","nome":"Sudeste"},"ES":{"id":3,"sigla":"SE","nome":"Sudeste"},"AL":{"id":2,"sigla":"NE","nome":"Nordeste"},"PB":{"id":2,"sigla":"NE","nome":"Nordeste"},"MS":{"id":5,"sigla":"CO","nome":"Centro-Oeste"},"RO":{"id":1,"sigla":"N","nome":"Norte"},"RR":{"id":1,"sigla":"N","nome":"Norte"},"AM":{"id":1,"sigla":"N","nome":"Norte"},"AP":{"id":1,"sigla":"N","nome":"Norte"},"SE":{"id":2,"sigla":"NE","nome":"Nordeste"},"RJ":{"id":3,"sigla":"SE","nome":"Sudeste"},"DF":{"id":5,"sigla":"CO","nome":"Centro-Oeste"}}', true);

        $graph['regions']['N']['value'] = 0;
        $graph['regions']['NE']['value'] = 0;
        $graph['regions']['CO']['value'] = 0;
        $graph['regions']['SE']['value'] = 0;
        $graph['regions']['S']['value'] = 0;

        foreach ($startups as $id => $startup) {
          if ($startup['state'] != '000000') {
            $startup['region'] = $states[$startup['state']];
            $sttp_p_region[$startup['region']['sigla']][] = $startup['id'];
            $sttp_p_category[$startup['category']][] = $startup['id'];
            $valid_startups[] = $startup;
          }
        }

        $total_sttps_cat = count($valid_startups);

        foreach ($sttp_p_region as $region => $data) {
          $graph['regions'][$region]['value']   = count($data);
          $graph['regions'][$region]['percent'] = round(((count($data) / $total_sttps) * 100), 0);
        }

        foreach ($sttp_p_category as $category => $data) {
          $graph['category'][$category]['value']   = count($data);
          $graph['category'][$category]['percent'] = round(((count($data) / $total_sttps) * 100), 0);
        }

        $graph['startups'] = $total_sttps;
        $graph['startups_categorized'] = $total_sttps_cat; 

        return view('paineladm/index', ['graph' => $graph]);
    }

    public function listStartups()
    {
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $startups = Query::queryAction('startups');

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

        foreach ($startups as $s_id => $sttp) {
          if ($sttp['city'] != '000000') {
            $this->cities[self::clearString($sttp['city'])] = $sttp['city'];
          }
        }

        foreach ($startups as $id => $startup) {
            $arr_ids[] = $id;
        }

        $custom_args_users['columns'] = ['id', 'name', 'email', 'startup'];
        $custom_args_users['column'] = 'startup';
        $custom_args_users['values'] = $arr_ids;

        $users = Query::queryActionIn('users', $custom_args_users);

        foreach ($users as $id => $user) {
            $startups[$user['startup']]['user'] = $user['name'];
            $startups[$user['startup']]['email'] = $user['email'];
        }

        $vars =
          [
            'all_regions' => $this->getDataRegions()['all_regions'],
            'cities'  => $this->cities,
            'articuladores'  => $this->getOptions(29),
            'tecnologias'  => $this->getOptions(4),
            'startups' => $startups,
            'message'  => self::$message,
          ];

        return view('paineladm/listagem', $vars);
    }
}
