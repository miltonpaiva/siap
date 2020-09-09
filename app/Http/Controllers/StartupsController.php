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
              'linkedin' => 'https://algo'///$time['linkedin'],
            ];

        $partcipat_saved[] = self::registerParticipant($participant);

      }

      return redirect()->route('concluido');

    }

    public static function registerParticipant($participant)
    {
        $new_participant_id =
            DB::table('participants')->insertGetId($participant);

        return $new_participant_id;

    }
}
