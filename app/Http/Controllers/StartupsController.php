<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\ResponsesController as Response;

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

        $vars =
          [
              'questions'  => $questions,
              'startup_id' => $startup_id,
          ];

        return view('inscricao', $vars);

    }

    public function actionRegister(Request $request)
    {
      $responses = $request->all();

      $startup_args['state']     = $responses['session'][1]['estado'];
      $startup_args['city']     = $responses['session'][1]['cidade'];
      $startup_args['category']  = $responses['session'][1]['categoria'];
      $startup_id = $responses['session'][1]['startup_id'];

      $path_root = str_replace('\public', '', $_SERVER["DOCUMENT_ROOT"]);
      $uploaddir = "{$path_root}\\files\\" . $startup_id . '\\';

      $dir_exist = is_dir($uploaddir);
      if (!$dir_exist) {
        $dir_exist = mkdir($uploaddir, 0777, true);
      }

      self::update($startup_args, $startup_id);

      $list_responses = [];
      foreach ($responses['session'] as $session => $questions) {
        if (isset($questions['questions'])) {
          foreach ($questions['questions'] as $question => $option) {
              $list_responses[] =
                [
                  'question' => $question,
                  'startup'  => $startup_id,
                  'option'   => $option['value'],
                ];
          }
        }
      }

      $responses_saved = [];
      foreach ($list_responses as $response) {
        $responses_saved[] = Response::register($response);
      }

      foreach ($responses['time'] as $time) {

          $file_name = $time['comprovacao']->getClientOriginalName();
          $temp_name = $time['comprovacao']->getPathName();

          $uploadfile = $uploaddir . basename($file_name);

          if (move_uploaded_file($temp_name, $uploadfile)) {

              $participant =
                [
                  'name' => $time['nome'],
                  'function' => 'Produto',//$time['funcao'],
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
                  'linkedin' => 'hrrps://algo'//$time['linkedin'],
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

      $anexos = $responses['session'][7]['anexos'];

      foreach ($anexos as $type => $anexo) {

          $file_name = $anexo->getClientOriginalName();
          $temp_name = $anexo->getPathName();

          $uploadfile = $uploaddir . basename($file_name);

          if (move_uploaded_file($temp_name, $uploadfile)) {

              $attachments[] =
                [
                  'archive' => $file_name,
                  'type' => $type,
                  'startup' => $startup_id,
                ];

          }
      }

      $attachments_saved = [];
      foreach ($attachments as $attachment) {
        $attachments_saved[] = self::registerAttachment($attachment);
      }

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
