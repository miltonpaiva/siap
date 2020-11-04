<?php


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

use Redirect;

use App\Http\Controllers\QueryActionController as Query;

header("Access-Control-Allow-Origin: *");

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $arr_status =
          [
            'rated' => 'Aguardando Habilitação',
            'approved' => 'Em Atratividade',
            'complete_attractive' => 'Aguardando 2° avaliação',
            'complete' => 'Aguardando 1° avaliação',
            'in_progress' => 'Em Prontidão',
            'reproved' => 'Reprovado Prontidão',
          ];


  	protected static function clearString ($string, $is_number = false)
  	{

  		// APENAS NUMEROS
  		if($is_number){
  			return preg_replace("/[^0-9]/", "", $string);
  		}

  		// REMOVE ACENTOS
  		$string = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ) );

  		// APENAS MINUSCULAS
  		$string = strtolower($string);

  		// REMOVE ESPAÇOS
  		$string = str_replace(' ','',$string);

  		return $string;
  	}

    public function getOptions($question)
    {
        $custom_args['conditions'] =
            [
                ['question', '=', $question],
            ];

        $options = Query::queryAction('options', $custom_args);

        foreach ($options as $o_id => $option) {
            $data[$o_id] = $option['name'];
        }

        return $data;
    }

    public static function upArchive($archive, $type, $startup_id)
    {
          $has_archive = is_object($archive);

          if ($has_archive) {
                $path_root = $_SERVER["DOCUMENT_ROOT"] . '/';
                $uploaddir = "{$path_root}/files/" . $startup_id . '/';

                $file_name = $archive->getClientOriginalName();
                $temp_name = $archive->getPathName();

                try {

                  $dir_exist = is_dir($uploaddir);
                  if (!$dir_exist) {
                      $dir_exist = mkdir($uploaddir, 0777, true);
                  }else{
                    chmod($uploaddir, 0777);
                  }

                  $uploadfile = $uploaddir . basename($file_name);
                  $uploaded = move_uploaded_file($temp_name, $uploadfile);
                  $attachment =
                      [
                        'archive' => $file_name,
                        'type' => $type,
                        'startup' => $startup_id,
                      ];

                } catch (\Exception $e) {
                    Log::error("Não foi possivel fazer upload do {$type} [{$file_name}] da startup [{$startup_id}]", [$e->getMessage()]);
                    return Redirect::back()->withErrors(["Não foi possivel fazer upload do {$type} [{$file_name}] da startup [{$startup_id}]"]);
                }
                return $attachment;
          }
          return false;
    }

    public static function getDataRegions()
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
