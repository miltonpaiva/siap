<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\ResponsesController as Response;
use App\Http\Controllers\QueryActionController as Query;
use App\Http\Controllers\UsersController as User;

header("Access-Control-Allow-Origin: *");

class StartupsController extends Controller
{
    public $message;
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

      $path_root = $_SERVER["DOCUMENT_ROOT"] . '/';
      $uploaddir = "{$path_root}/files/" . $startup_id . '/';

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

    public function viewStartups()
    {
        $user_logged = User::checkLogin();
        if (is_object($user_logged)) {
            return $user_logged;
        }

        $startups = Query::queryAction('startups');

        if (isset($_GET['regiao'])) {
          $startups = $this->getFilterRegion($startups);
        }

        foreach ($startups as $s_id => $sttp) {
          if ($sttp['city'] != '000000') {
            $this->cities[self::clearString($sttp['city'])] = $sttp['city'];
          }
        }

        if (isset($_GET['cidade'])) {
          $startups = $this->getFilterCity($startups);
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
            'startups' => $startups,
            'message'  => $this->message,
          ];

        return view('paineladm/listagem', $vars);
    }

    public function viewRating($startup_id)
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

        $result = self::registerRating($rating);
      }

      $result = self::update(['stage' => 'rated'], $startup_id);

      return redirect()->route('startup.list');
    }

    public static function registerRating($rating)
    {
        $new_rating_id =
            DB::table('rating')->insertGetId($rating);

        return $new_rating_id;
    }

    public function getFilterCity($startups)
    {
      foreach ($startups as $s_id => $sttp) {
        if ($_GET['cidade'] == self::clearString($sttp['city'])) {
          $data[$s_id] = $sttp;
        }
      }

      if (count($data) > 0) {
        return $data;
      }else{
        $this->message = ['type' => 'danger', 'message' => 'O filtro de CIDADE não retornou dados !'];
        return $startups;
      }

    }

    public function getFilterRegion($startups)
    {
          $cities = $this->getDataRegions()['cities'];

          foreach ($startups as $s_id => $sttp) {

                if ($sttp['state'] == 'CE') {
                  $is_city =
                    isset(
                      $cities[self::clearString($sttp['city'])]
                    );

                  if ($is_city) {
                      $region_c = $cities[self::clearString($sttp['city'])];
                      $data[$region_c][$s_id] = $sttp;
                  }else{
                     $not_ached[] = $sttp;
                  }
                }
          }

          if (isset($data[$_GET['regiao']])) {
            return $data[$_GET['regiao']];
          }else{
            $this->message = ['type' => 'danger', 'message' => 'O filtro de REGIÃO não retornou dados !'];
            return $startups;
          }

    }

    public function getDataRegions()
    {
          $cities_region =
          [
              'cariri' =>
                  [
                      'name' => 'Cariri',
                      'cities' =>
                      [
                        'abaiara',
                        'altaneira',
                        'antoninadonorte',
                        'antonina',
                        'araripe',
                        'assare',
                        'aurora',
                        'barbalha',
                        'barro',
                        'brejosanto',
                        'campossales',
                        'campos',
                        'caririacu',
                        'crato',
                        'fariasbrito',
                        'granjeiro',
                        'jardim',
                        'jati',
                        'juazeirodonorte',
                        'juazeiro',
                        'mauriti',
                        'milagres',
                        'missaovelha',
                        'novaolinda',
                        'penaforte',
                        'porteiras',
                        'potengi',
                        'salitre',
                        'santanadocariri',
                        'tarrafas',
                      ],
                  ],
              'centro_sul' =>
                  [
                      'name' => 'Centro-Sul',
                      'cities' =>
                      [
                        'acopiara',
                        'baixio',
                        'carius',
                        'catarina',
                        'cedro',
                        'ico',
                        'iguatu',
                        'ipaumirim',
                        'jucas',
                        'lavrasdamangabeira',
                        'oros',
                        'quixelo',
                        'saboeiro',
                        'umari',
                        'varzeaalegre',
                      ],
                  ],
              'grande_fortaleza' =>
                  [
                      'name' => 'Grande Fortaleza',
                      'cities' =>
                      [
                        'aquiraz',
                        'caucaia',
                        'chorozinho',
                        'eusebio',
                        'fortaleza',
                        'guaiuba',
                        'horizonte',
                        'itaitinga',
                        'maracanau',
                        'maranguape',
                        'pacajus',
                        'pacatuba',
                        'saogoncalodoamarante',
                      ],
                  ],
              'litoral_leste' =>
                  [
                      'name' => 'Litoral Leste',
                      'cities' =>
                      [
                        'aracati',
                        'beberibe',
                        'cascavel',
                        'fortim',
                        'icapui',
                        'itaicaba',
                        'jaguaruana',
                        'pindoretama',
                      ],
                  ],
              'litoralnorte' =>
                  [
                      'name' => 'Litoral Norte',
                      'cities' =>
                      [
                      'acarau',
                      'barroquinha',
                      'belacruz',
                      'camocim',
                      'chaval',
                      'cruz',
                      'granja',
                      'itarema',
                      'jijocadejericoacoara',
                      'marco',
                      'martinopole',
                      'morrinhos',
                      'uruoca',
                      ],
                  ],
              'litoral_oeste' =>
                  [
                      'name' => 'Litoral Oeste',
                      'cities' =>
                      [
                        'amontada',
                        'apuiares',
                        'generalsampaio',
                        'iraucuba',
                        'itapaje',
                        'itapipoca',
                        'miraima',
                        'paracuru',
                        'paraipaba',
                        'pentecoste',
                        'saoluisdocuru',
                        'tejucuoca',
                        'trairi',
                        'tururu',
                        'umirim',
                        'uruburetama',
                      ],
                  ],
              'macico_do_baturite' =>
                  [
                      'name' => 'Maciço de Baturité',
                      'cities' =>
                      [
                        'acarape',
                        'aracoiaba',
                        'aratuba',
                        'barreira',
                        'baturite',
                        'capistrano',
                        'guaramiranga',
                        'itapiuna',
                        'mulungu',
                        'ocara',
                        'pacoti',
                        'palmacia',
                        'redencao',
                      ],
                  ],
              'serra_da_ibiapaba' =>
                  [
                      'name' => 'Serra da Ibiapaba',
                      'cities' =>
                      [
                        'carnaubal',
                        'croata',
                        'guaraciabadonorte',
                        'ibiapina',
                        'ipu',
                        'saobenedito',
                        'tiangua',
                        'ubajara',
                        'vicosadoceara',
                      ],
                  ],
              'sertao_central' =>
                  [
                      'name' => 'Sertão Central',
                      'cities' =>
                      [
                        'banabuiu',
                        'choro',
                        'depirapuanpinheiro',
                        'ibaretama',
                        'ibicuitinga',
                        'milha',
                        'mombaca',
                        'pedrabranca',
                        'pedra',
                        'piquetcarneiro',
                        'quixada',
                        'quixeramobim',
                        'senadorpompeu',
                        'solonopole',
                      ],
                  ],
              'sertao_de_caninde' =>
                  [
                      'name' => 'Sertão de Canindé',
                      'cities' =>
                      [
                        'boaviagem',
                        'caninde',
                        'caridade',
                        'itatira',
                        'madalena',
                        'paramoti',
                      ],
                  ],
              'sertao_de_sobral' =>
                  [
                      'name' => 'Sertão de Sobral',
                      'cities' =>
                      [
                        'alcantaras',
                        'carire',
                        'coreau',
                        'forquilha',
                        'frecheirinha',
                        'graca',
                        'groairas',
                        'massape',
                        'meruoca',
                        'moraujo',
                        'mucambo',
                        'pacuja',
                        'piresferreira',
                        'reriutaba',
                        'santanadoacarau',
                        'senadorsa',
                        'sobral',
                        'varjota',
                      ],
                  ],
              'sertao_dos_crateus' =>
                  [
                      'name' => 'Sertão dos Crateus',
                      'cities' =>
                      [
                        'ararenda',
                        'catunda',
                        'crateus',
                        'hidrolandia',
                        'independencia',
                        'ipaporanga',
                        'ipueiras',
                        'monsenhortabosa',
                        'novarussas',
                        'novooriente',
                        'poranga',
                        'santaquiteria',
                        'tamboril',
                      ],
                  ],
              'sertao_dos_inhamuns' =>
                  [
                      'name' => 'Sertão dos Inhamuns',
                      'cities' =>
                      [
                        'aiuaba',
                        'arneiroz',
                        'parambu',
                        'quiterianopolis',
                        'taua',
                      ],
                  ],
              'vale_do_jaguaribe' =>
                  [
                      'name' => 'Vale do Jaguaribe',
                      'cities' =>
                      [
                        'altosanto',
                        'erere',
                        'iracema',
                        'jaguaretama',
                        'jaguaribara',
                        'jaguaribe',
                        'limoeirodonorte',
                        'moradanova',
                        'palhano',
                        'pereiro',
                        'potiretama',
                        'quixere',
                        'russas',
                        'saojoaodojaguaribe',
                        'tabuleirodonorte',
                      ],
                  ],
          ];

          foreach ($cities_region as $region => $value) {
              $all_regions[$region] = $value['name'];
              foreach ($value['cities'] as $city) {
                  $cities[$city] = $region;
              }
          }

          return ['cities' => $cities, 'all_regions' => $all_regions, 'cities_region' => $cities_region];
    }
}
