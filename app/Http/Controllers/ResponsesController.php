<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

use Redirect;
use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;
use App\Http\Controllers\UsersController as User;

header("Access-Control-Allow-Origin: *");

class ResponsesController extends Controller
{
    public static function questionsList($return_mode = 'json')
    {
        $options   = Query::queryAction('options');
        $questions = Query::queryAction('questions');

        $questions = self::agroupData($options, $questions);

        return $questions;
    }

    public static function agroupData($options, $questions)
    {
        $agrouped_options = [];
        $result           = [];

        foreach ($options as $o_id => $option) {
            $q_id = $option['question'];
            $agrouped_options[$q_id][$o_id] = $option;
        }

        foreach ($questions as $q_id => $question) {
            $session = $question['session'];
            $question['options'] = (isset($agrouped_options[$q_id]))? $agrouped_options[$q_id] : [] ;
            $result[$session][$q_id] = $question;
        }
        return $result;
    }

    public static function register($response)
    {
        $new_response_id =
            DB::table('responses')->insertGetId($response);

        return $new_response_id;
    }

    public static function update($id, $option)
    {
        try {
            $result =
                DB::table('responses')
                          ->where('id', $id)
                          ->update(['option' => $option]);

            return $result;
         } catch (\Exception $e) {
            Log::error("Não foi possivel atualizar a Startup [{$attractive['startup']}]", [$e->getMessage()]);
            return false;
         }
    }

    public static function responseList()
    {
        $responses = Query::queryAction('responses');
        return $responses;
    }

    public function actionRegister(Request $request)
    {
        $responses = $request->all();
        $list_responses = [];
        $data = json_decode($responses['responses'], true);
        foreach ($data as $response) {

              if (isset($response['response'])) {
                $list_responses[] =
                  [
                    'option'   => $response['option'],
                    'response' => $response['response'],
                  ];
              }else{
                $custom_args['columns'] =
                    [
                        'id',
                    ];

                $custom_args['conditions'] =
                    [
                        ['startup', '=', $response['startup']],
                        ['question', '=', $response['question']],
                    ];

                $has_response = @max(Query::getSampleData('responses', 'id', $custom_args));

                if ($has_response) {
                    $list_responses[] =
                      [
                        'option'   => $response['option'],
                        'response' => $has_response,
                      ];
                }else{
                    $list_responses[] =
                      [
                        'question' => $response['question'],
                        'startup'  => $response['startup'],
                        'option'   => $response['option'],
                      ];
                }

              }
        }

          $responses_saved = [];
          foreach ($list_responses as $response) {
            if ($response['option'] != '') {
                if (isset($response['response'])) {
                  $responses_saved[] = self::update($response['response'], $response['option']);
                }else{
                  $responses_saved[] = self::register($response);
                }
            }
          }
        echo json_encode(['status' => 200, 'message' => $responses_saved]);
        exit();
    }

    public function newOption(Request $request)
    {
        $data = $request->all();
        $data_option = json_decode($data['option'], true);

        $option =
        [
            'question' => $data_option['question'],
            'name' => $data_option['option'],
            'session' => 1
        ];

        $new_option_id =
            DB::table('options')->insertGetId($option);

        $response =
        [
            'question' => $data_option['question'],
            'startup' => $data_option['startup'],
            'option' => $new_option_id,
        ];

        $result = self::register($response);

        echo json_encode(['status' => 200, 'message' => $result]);
        exit();
    }

    public function actionRegisterAttractive(Request $request)
    {
        session_start();
        $startup_id = $_SESSION['login']['startup_id'];

        $data = $request->all();

        $sttp_up = self::updateStartup($startup_id, $data['startup']);
        $prtcp_up = self::updateAndcreateParticipants($startup_id, $data);

        $attachments = $prtcp_up['archive'];

        if (isset($data['files']['slide'])) {
            $result = self::upArchive($data['files']['slide'], 'slide', $startup_id);
            if (is_object($result)) { return $result; }
            $attachments[] = $result;
        }else{
            return Redirect::back()->withErrors(["Não foi registrar a resposta da startup [{$startup_id}], slide ausente."]);
        }
        // if (isset($data['files']['certificados'])){
        //     foreach ($data['files']['certificados'] as $att) {
        //         $result = self::upArchive($att, 'certificado', $startup_id);
        //         if (is_object($result)) { return $result; }
        //         $attachments[] = $result;
        //     }
        // }else{
        //     return Redirect::back()->withErrors(["Não foi registrar a resposta da startup [{$startup_id}], não ha certificados."]);
        // }

        $attachments_saved = [];
        foreach ($attachments as $attachment) {
            $result = Startup::registerAttachment($attachment);
            if (is_object($result)) {
              return $result;
            }
            $attachments_saved[] = $result;
        }

        $result = Startup::update(['stage' => 'complete_attractive'], $startup_id);

        $_SESSION['message'] =
        [
            'type' => 'success',
            'message' => "Formulario salvo com Sucesso !",
        ];

        return redirect()->route('user.painel.view');
    }

    public static function updateStartup($startup_id, $data)
    {
        $sttp =
            [
                'name' => $data['name'],
                'city' => $data['city'],
            ];

        try {

            $result_s = Startup::update($sttp, $startup_id);

            foreach ($data['question'] as $question => $resp) {
                if ($resp['response'] != '') {
                    $result_o[$question] = self::update($resp['response'], $resp['option']);
                }else{
                    $response =
                        [
                            'question' => $question,
                            'startup' => $startup_id,
                            'option' => $resp['option'],
                        ];

                    $result_o[$question] = self::register($response);
                }
            }

            return ['startup' => $result_s, 'options' => $result_o, ];

         } catch (\Exception $e) {
            Log::error("Não foi possivel atualizar a Startup [{$attractive['startup']}]", [$e->getMessage()]);
            return false;
         }
    }

    public static function updateAndcreateParticipants($startup_id, $data)
    {
        $att_up = [];
        if (isset($data['time'])) {
            foreach ($data['time'] as $p_id => $time) {

                $participant =
                  [
                    'name' => @$time['nome'],
                    'function' => @$time['funcao'],
                    'startup' => $startup_id,
                    'rg' => @$time['rg'],
                    'cpf' => @$time['cpf'],
                    'institution' => @$time['instensino'],
                    'course' => @$time['curso'],
                    'formation' => @$time['formacao'],
                    'address' => @$time['logradouro'],
                    'city' => @$time['cidade'],
                    'data_nasc' => @$time['datanasc'],
                    'telephone' => @$time['telcontato'],
                    'email' => @$time['emailmenbro'],
                    'linkedin' => @$time['linkedin'],
                    'state' => @$time['estado'],
                    'emitting_organ' => @$time['orgemaissor'],
                  ];

                $partcipat_saved[] =
                  $id_partcipat = Startup::updateParticipant($p_id, $participant);
            }
        }

        if (isset($data['time_new'])) {
            foreach ($data['time_new'] as $p_id => $time) {

                $participant =
                  [
                    'name' => @$time['nome'],
                    'function' => @$time['funcao'],
                    'startup' => $startup_id,
                    'rg' => @$time['rg'],
                    'cpf' => @$time['cpf'],
                    'institution' => @$time['instensino'],
                    'course' => @$time['curso'],
                    'formation' => @$time['formacao'],
                    'address' => @$time['logradouro'],
                    'city' => @$time['cidade'],
                    'data_nasc' => @$time['datanasc'],
                    'telephone' => @$time['telcontato'],
                    'email' => @$time['emailmenbro'],
                    'linkedin' => @$time['linkedin'],
                    'state' => @$time['estado'],
                    'emitting_organ' => @$time['orgemaissor'],
                  ];

                $partcipat_saved[] =
                  $id_partcipat = Startup::registerParticipant($participant);

                $result = self::upArchive($time['comprovacao'], 'experiencia', $startup_id);
                $result['participant'] = $id_partcipat;

                $att_up[] = $result;
            }
        }

        return ['participants' => $partcipat_saved, 'archive' => $att_up];
    }

    public function saveDinamicResponse(Request $request)
    {
        $data = $request->all();

        $attractive =
            [
                'startup' => $data['startup'],
                'question' => $data['criterea'],
                'response' => $data['response'],
            ];

        $custom_args['conditions'] =
            [
                ['startup', '=', $data['startup']],
                ['question', '=', $data['criterea']],
            ];

        $has_response = @max(Query::getSampleData('attractive', 'id', $custom_args));

        if ($has_response) {
            $result = self::updateAttractive($has_response, $data['response']);
        }else{
            $result = self::registerAttractive($attractive);
        }

        echo json_encode(['status' => 200, 'message' => $result]);
        exit();

    }

    public static function registerAttractive($attractive)
    {
        try {
            $new_attractive_id =
                DB::table('attractive')->insertGetId($attractive);

            return $new_attractive_id;
         } catch (\Exception $e) {
            Log::error("Não foi possivel registrar a resposta da startup [{$attractive['startup']}]", [$e->getMessage()]);
            return false;
         }
    }

    public static function updateAttractive($id, $response)
    {
        try {
            $result =
                DB::table('attractive')
                          ->where('id', $id)
                          ->update(['response' => $response]);

            return $result;
         } catch (\Exception $e) {
            Log::error("Não foi possivel atualizar a resposta da startup [{$attractive['startup']}]", [$e->getMessage()]);
            return false;
         }
    }

    public function viewAttractiveResponses($startup_id)
    {
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $custom_args['conditions'] =
            [
                ['id', '=', $startup_id],
            ];

        $startup = current(Query::queryAction('startups', $custom_args));

        $question_per_session =
            [
                11 => 2,
                12 => 2,
                13 => 2,
                14 => 3,
                15 => 3,
                16 => 3,
                17 => 3,
                18 => 2,
                19 => 2,
                20 => 2,
                21 => 2,
                22 => 2,
                23 => 2,
                24 => 2,
                25 => 2,
                26 => 2,
                27 => 2,
                28 => 2,
                29 => 2,
                30 => 2,
                31 => 3,
                32 => 3,
                33 => 3,
                34 => 3,
                35 => 3,
                36 => 3,
                37 => 3,
                38 => 3,
                39 => 3,
                40 => 4,
                41 => 4,
                42 => 4,
                43 => 4,
                44 => 4,
                45 => 4,
                46 => 4,
                47 => 5,
                48 => 5,
                49 => 5,
            ];

        $custom_args['conditions'] =
            [
                ['type', '=', $startup['category']],
            ];

        $questions = Query::queryAction('questions_attractive', $custom_args);

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id],
            ];

        $attractives = Query::queryAction('attractive', $custom_args);

        $resp_agroup = [];
        foreach ($attractives as $a_id => $attr) {
            $key = @$question_per_session[$attr['question']];

            if ($key) {
                @$resp_agroup[$key][$attr['question']] = $attr;
                @$resp_agroup[$key][$attr['question']]['question'] = @$questions[$attr['question']];
            }else{
                @$resp_agroup['video'][$attr['question']] = $attr;
                @$resp_agroup['video'][$attr['question']]['question'] = @$questions[$attr['question']];
            }
        }

        $data = $resp_agroup['video'][10]['response'];
        $url['type'] = 'link';
        $url['link'] = $data;

        if (strrpos($data , 'youtube')) {
            if (strrpos($data, 'youtube.com/watch?v=')) {
                $id_video = explode('youtube.com/watch?v=', $data)[1];
                $url['type'] = 'video';
                $url['link'] = "https://www.youtube.com/embed/{$id_video}";
            }
        }
        if (strrpos($data , 'youtu.be/')) {
            $id_video = explode('youtu.be/', $data)[1];
            $url['type'] = 'video';
            $url['link'] = "https://www.youtube.com/embed/{$id_video}";
        }

        $custom_args['conditions'] =
            [
                ['startup', '=', $startup_id],
                ['type', '=', 'slide'],
            ];

        $attachment = current(Query::queryAction('attachments', $custom_args));

        $vars =
            [
                'responses' => $resp_agroup,
                'url' => $url,
                'attachment' => $attachment,
                'startup' => $startup,
            ];

        return view('paineladm/atratividade', $vars);
    }

}
