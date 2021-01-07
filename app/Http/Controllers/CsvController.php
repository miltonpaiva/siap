<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Redirect;
use DB;

use App\Http\Controllers\QueryActionController as Query;
use App\Http\Controllers\FiltersController as Filters;
use App\Http\Controllers\UsersController as User;

header("Access-Control-Allow-Origin: *");

class CsvController extends Controller
{
    public static $message;
    public $cities;

    public static $ids;
    public static $relations;
    public static $tables;

    function __construct()
    {
      $default_relation =
        [
          'column' => 'startup',
          'table'  => 'startups',
        ];

      self::$relations['users']     = $default_relation;
      self::$relations['criterea']  = $default_relation;
      self::$relations['questions'] = $default_relation;
    }

    public function gerCsvStartups()
    {
        $path_root = $_SERVER["DOCUMENT_ROOT"] . '/';
        $uploaddir = "{$path_root}/files/startups.txt";

        $cities = self::getDataRegions()['cities'];
        $regions = self::getDataRegions()['all_regions'];

        $startups = Query::queryAction('startups');

        foreach ($startups as $id => $sttp) {
            $arr_ids[] = $id;
            $startups[$id]['stage'] = self::$arr_status[$sttp['stage']];

            if ($sttp['state'] == '000000') {$startups[$sttp['id']]['state'] = ' --- ';}
            if ($sttp['city'] == '000000') {$startups[$sttp['id']]['city'] = ' --- ';}

            $startups[$id]['stage'] = self::$arr_status[$sttp['stage']];

            $city = $sttp['city'];
            $is_city =
                isset(
                  $cities[self::clearString($city)]
                );
            if ($is_city) {
                $startups[$id]['region'] = $regions[$cities[self::clearString($city)]];
            }else{
                $startups[$id]['region'] = ' --- ';
            }
        }

        $custom_args_users['columns'] = ['id', 'name', 'email', 'startup'];
        $custom_args_users['column'] = 'startup';
        $custom_args_users['values'] = $arr_ids;

        $users = Query::queryActionIn('users', $custom_args_users);

        foreach ($users as $id => $user) {
            $startups[$user['startup']]['user'] = $user['name'];
            $startups[$user['startup']]['email'] = $user['email'];
        }

        $lines[] = "ID;STARTUP;CIDADE;ESTADO;REGIÃO;RESPONSÁVEL;RESP. EMAIL;CATEGORIA;STATUS\n";
        foreach ($startups as $sttp) {
            $lines[] =
              "{$sttp['id']};{$sttp['name']};{$sttp['city']};{$sttp['state']};{$sttp['region']};{$sttp['user']};{$sttp['email']};{$sttp['category']};{$sttp['stage']}\n";
        }

        if (is_file($uploaddir)) {
            unlink($uploaddir);
        }

        foreach ($lines as $line) {
            $result[] = file_put_contents($uploaddir, $line, FILE_APPEND);
        }

        echo json_encode(['status' => 200, 'message' => 'arquivo gerado']);
        exit();
    }

    public function viewCsv()
    {

      $user_logged = User::checkLogin();
      if (is_object($user_logged)) {
          return $user_logged;
      }

      // AGRUPANDO COLUNAS SIMPLES
      $cols['startups'] = Query::getColuns('startups');
      $cols['users'] = Query::getColuns('users');

      // AGRUPANDO QUESTÕES
      $quest['prontidao'] = Query::queryAction('questions');
      $quest['atratividade'] = Query::queryAction('questions_attractive');

      // AGRUPANDO CRITERIOS
      $crite = [];
      foreach (Query::queryAction('criterea') as $c_id => $criterea) {
        $fase =
          ($criterea['stage'] != 'atratividade') ? 'prontidao' : $criterea['stage'] ;

        $crite[$fase][$c_id] = $criterea;
      }

      $args =
        [
          'columns' => $cols,
          'questions' => $quest,
          'critereas' => $crite,
          'translate' => self::$translate,
        ];

      return view('paineladm/csv_view', $args);
    }

    public function actionGenerate(Request $request)
    {

        $path_root = $_SERVER["DOCUMENT_ROOT"] . '/';
        $uploaddir = "{$path_root}/files/startups.txt";

        $data_col_json = $request->all()['data'];

        $data_col = json_decode($data_col_json, true);

        $data_csv['tables'] = self::getDataTables($data_col);

        if (isset($data_col['questions']) && self::checkRelation('questions')) {
          $data_csv['questions'] = self::getDataQuestions($data_col);
        }
        if (isset($data_col['criterea']) && self::checkRelation('criterea')) {
          $data_csv['criterea'] = self::getDataCriterea($data_col);
        }

        $types = array_keys($data_csv);

        // AGRUPANDO OS DADOS EM LINHAS
        $lines = [];
        $lines['title'] = self::getTitle($data_col, $types);
        foreach ($types as $type) {
          foreach ($data_csv[$type] as $ref => $data) {
            if (isset($lines[$ref])) {
              $lines[$ref] .=  implode(';', $data) . ';';
            }elseif ($type == 'tables') {
              $lines[$ref] =  implode(';', $data) . ';';
            }
          }
        }

        if (is_file($uploaddir)) {
            unlink($uploaddir);
        }

        foreach ($lines as $line) {
            $line .= "\n";
            $result[] = file_put_contents($uploaddir, $line, FILE_APPEND);
        }

        echo json_encode(['status' => 200, 'message' => 'arquivo gerado']);
        exit();

    }

    public static function getDataTables($data_col)
    {
        $tables = [];
        $table_col = [];
        $data_csv = [];
        $data_csv_agroup = [];
        $relations = self::$relations;

        // LISTANDO AS TABELAS E COLUNAS
        foreach ($data_col['tables'] as $table => $columns) {
          self::$tables = $tables[$table] = $table;
          foreach ($columns['columns'] as $col) {
            $table_col[] = "{$table}_{$col}";
          }
        }

        self::$tables = $tables;

        // PEGANDO OS DADOS DAS TABELAS ESPECIFICAS SEM DEPENDENCIA
        foreach ($tables as $table) {
          $has_relations = self::checkRelation($table);

          if (!$has_relations) {
            $data_csv[$table] = Query::queryAction($table);
            self::$ids[$table] = Query::getSampleData($table, 'id');
          }
        }

        // PEGANDO OS DADOS DAS TABELAS ESPECIFICAS COM DEPENDENCIA
        foreach ($tables as $table) {
          $has_relations = self::checkRelation($table);

          if ($has_relations) {
            $rel = self::$relations[$table];

            $custom_args['column'] = $rel['column'];
            $custom_args['values'] = self::$ids[$rel['table']];

            $data_csv[$table] = Query::queryActionIn($table, $custom_args);
            self::$ids[$table] = Query::getSampleData($table, 'id');
          }
        }

        // AGRUPANDO OS DADOS POR LINHA
        foreach ($data_col['tables'] as $table => $columns) {

          // pegando dados por tabela
          foreach ($data_csv[$table] as $data_tables) {

            $line = "{$table}_{$data_tables['id']}";

            // percorrendo as colunas dos dados da tabela
            foreach ($data_tables as $dt_col => $value) {

              // ordenando e limpando as colunas não selecionadas
              $ref_col = "{$table}_{$dt_col}";
              if (in_array($ref_col, $table_col)) {

                // verificando existencia de dependencia, e agrupando
                $has_relations = self::checkRelation($table);
                if ($has_relations) {
                  $rel = self::$relations[$table];
                  $line = "{$rel['table']}_{$data_tables[$rel['column']]}";
                  $data_csv_agroup[$line]["{$table}_{$dt_col}"] = str_replace(';', '', $value);
                }else{
                  $data_csv_agroup[$line]["{$table}_{$dt_col}"] = str_replace(';', '', $value);
                }

              }
            }
          }
        }

        // limpando dados adicionais
        foreach ($data_csv_agroup as $key => $value) {
          if (count($value) != count($table_col)) {
            unset($data_csv_agroup[$key]);
          }
        }

        return $data_csv_agroup;
    }

    public static function getDataQuestions($data_col)
    {
      $data_quest = [];

      // agrupando ids de questão por fases
      $ids_per_fase = [];
      foreach ($data_col['questions'] as $fase => $questions) {
        if ($fase == 'prontidao') { $options = Query::queryAction('options'); }
        foreach ($questions['questions'] as $quest) {
          $ids_per_fase[$fase][$quest['id']] = $quest['id'];
        }
      }

      // pegando as respostas das questões por fase
      foreach ($ids_per_fase as $fase => $ids) {

        $custom_args['column'] = 'question';
        $custom_args['values'] = $ids;

        $table = ($fase == 'prontidao')? 'responses' : 'attractive' ;

        $data_quest[$fase] = Query::queryActionIn($table, $custom_args);
      }

      // montando os dados do csv
      $data_csv = [];
      foreach ($data_quest as $fase => $resps) {
        foreach ($resps as $r_id => $quest) {
          $line = "startups_{$quest['startup']}";
          $data_csv[$line][$quest['question']] =
            @str_replace(';', '', @$quest['response']);

          if ($fase == 'prontidao') {
            $data_csv[$line][$quest['question']] =
              str_replace(';', '', $options[$quest['option']]['name']);
          }

          // garantindo que não havera questões indexistentes
          foreach ($ids_per_fase[$fase] as $q) {
            if (!isset($data_csv[$line][$q])) {
              $data_csv[$line][$q] = '---';
            }
          }

        }
      }

      return $data_csv;
    }

    public static function getDataCriterea($data_col)
    {

      // agrupando ids de criterios por fases
      $ids_per_fase = [];
      foreach ($data_col['criterea'] as $fase => $critereas) {
        foreach ($critereas['critereas'] as $crite) {
          $ids_per_fase[$fase][$crite['id']] = $crite['id'];
        }
      }

      // pegando as notas dos criterios por fase
      $data_crite = [];
      foreach ($ids_per_fase as $fase => $ids) {

        $custom_args['column'] = 'criterea';
        $custom_args['values'] = $ids;

        $table = ($fase == 'prontidao')? 'rating' : 'rating_attractive' ;

        $data_crite[$fase] = Query::queryActionIn($table, $custom_args);
      }

      // montando os dados do csv
      $data_csv = [];
      foreach ($data_crite as $fase => $notes) {
        foreach ($notes as $note) {
          $line = "startups_{$note['startup']}";
          $data_csv[$line][$note['criterea']] = $note['note'];

          // garantindo que não havera questões indexistentes
          foreach ($ids_per_fase[$fase] as $c) {
            if (!isset($data_csv[$line][$c])) {
              $data_csv[$line][$c] = '---';
            }
          }

        }
      }

      return $data_csv;
    }

    public static function checkRelation($table)
    {
      $relations = self::$relations;
      $tables = self::$tables;

      return (
              isset($relations[$table]) && 
              isset($tables[$relations[$table]['table']])
            );
    }

    public static function getTitle($data_col, $types)
    {

        $names['questions'] = Query::getSampleData('questions', 'name');
        $names['critereas'] = Query::getSampleData('criterea', 'name');
        $names['questions_prontidao'] = Query::getSampleData('questions', 'name');
        $names['questions_atratividade'] = Query::getSampleData('questions_attractive', 'name');

        // LISTANDO AS COLUNAS
        foreach ($data_col['tables'] as $table => $columns) {
          foreach ($columns['columns'] as $col) {
            $name = (isset(self::$translate[$col]))? self::$translate[$col] : $col ;
            $name = mb_strtoupper($name);

            $table_col["{$table}_{$col}"] = $name;
          }
        }

        // LISTANDO AS COLUNAS
        foreach ($types as $type) {
          if ($type != 'tables') {
            foreach ($data_col[$type] as $fase => $data) {
              foreach ($data as $type_data => $values ) {
                foreach ($values as $value) {
                  $ref = $type_data;
                  if ($type == 'questions') {$ref = "{$type_data}_{$fase}";}
                  $name = $names[$ref][$value['id']];
                  $name = mb_strtoupper($name);

                  $table_col["{$type_data}_{$fase}_{$value['id']}"] = $name;
                }
              }
            }
          }
        }

        return implode(';', $table_col);
    }
}
