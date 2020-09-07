<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\QueryActionController as Query;

class ResponsesController extends Controller
{
    public function questionsList($return_mode = 'json')
    {
        $options   = Query::queryAction('options');
        $questions = Query::queryAction('questions');

        $questions = $this->agroupData($options, $questions);

        return view('inscricao', ['questions' => $questions]);
        // return $agrouped;
    }

    public function agroupData($options, $questions)
    {
        $agrouped_options = [];
        $result           = [];

        foreach ($options as $o_id => $option) {
            $q_id = $option['question'];
            $agrouped_options[$q_id][$o_id] = $option;
        }

        foreach ($questions as $q_id => $question) {
            $session = $question['session'];
            $question['options'] = $agrouped_options[$q_id];
            $result[$session][$q_id] = $question;
        }
        return $result;
    }
}
