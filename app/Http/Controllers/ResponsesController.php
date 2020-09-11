<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use DB;

use App\Http\Controllers\QueryActionController as Query;

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
        $result =
            DB::table('responses')
                      ->where('id', $id)
                      ->update(['option' => $option]);

        return $result;
    }

    public static function responseList()
    {
        $responses = Query::queryAction('responses');
        return $responses;
    }

    public function actionRegister(Request $request)
    {
        $responses = $request->all();

        $data = json_decode($responses['responses'], true);
        foreach ($data as $response) {
              if (isset($response['response'])) {
                $list_responses[] =
                  [
                    'option'   => $response['option'],
                    'response' => $response['response'],
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

          $responses_saved = [];
          foreach ($list_responses as $response) {
            if (isset($response['response'])) {
              $responses_saved[] = self::update($response['response'], $response['option']);
            }else{
              $responses_saved[] = self::register($response);
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
}
