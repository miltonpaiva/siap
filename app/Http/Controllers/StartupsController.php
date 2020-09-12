<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\ResponsesController as Response;
use App\Http\Controllers\QueryActionController as Query;

header("Access-Control-Allow-Origin: *");

class StartupsController extends Controller
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

        $questions = Response::questionsList('array');

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id]
            ];

        $responses = Query::queryAction('responses', $custom_args);

        $participants = Query::queryAction('participants', $custom_args);

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
              'participant' => current($participants),
          ];

        if ($startup['stage'] == 'complete') {
            return redirect()->route('concluido');
        }

        return view('inscricao', $vars);
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
      $responses = $request->all();
      $attachments = [];

      $startup_id = $responses['session'][1]['startup_id'];

      $path_root = str_replace('\public', '', $_SERVER["DOCUMENT_ROOT"]);
      $uploaddir = "{$path_root}\\files\\" . $startup_id . '\\';

      $dir_exist = is_dir($uploaddir);
      if (!$dir_exist) {
        $dir_exist = mkdir($uploaddir, 0777, true);
      }

      $list_responses = [];

      if (isset($responses['time'])) {

        foreach ($responses['time'] as $time) {

            if (isset($time['comprovacao'])) {
              $has_archive = is_object($time['comprovacao']);

              if ($has_archive) {
                $file_name = $time['comprovacao']->getClientOriginalName();
                $temp_name = $time['comprovacao']->getPathName();
                $uploadfile = $uploaddir . basename($file_name);
                move_uploaded_file($temp_name, $uploadfile);
              }
            }

            if (true) {

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
                    'telephone' => $time['telcontato'],
                    'email' => $time['emailmenbro'],
                    'linkedin' => $time['linkedin'],
                  ];

                $partcipat_saved[] =
                  $id_partcipat = self::registerParticipant($participant);

                $attachments[] =
                  [
                    'archive' => $file_name,
                    'type' => 'experiencia',
                    'startup' => $startup_id,
                    'participant' => $id_partcipat,
                  ];
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

            }
        }

      }

      $attachments_saved = [];
      foreach ($attachments as $attachment) {
        $attachments_saved[] = self::registerAttachment($attachment);
      }


      $result = self::update(['stage' => 'complete'], $startup_id);

      return redirect()->route('concluido');

    }

    public static function registerParticipant($participant)
    {
        $new_participant_id =
            DB::table('participants')->insertGetId($participant);

        return $new_participant_id;
    }

    public static function registerAttachment($attachment)
    {
        $new_attachment_id =
            DB::table('attachments')->insertGetId($attachment);

        return $new_attachment_id;
    }
}
