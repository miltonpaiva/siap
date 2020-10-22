<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Controllers\StartupsController as Startup;
use App\Http\Controllers\QueryActionController as Query;

header("Access-Control-Allow-Origin: *");

class FiltersController extends Controller
{
    public static function getFilterArticulador($startups)
    {
        $data = [];
        $custom_args['conditions'] =
            [
                ['question', '=', 29],
                ['option', '=', $_GET['articulador']],
            ];

        $responses = Query::queryAction('responses', $custom_args);

        foreach ($responses as $resp) {
            if (isset($startups[$resp['startup']])) {
              $data[$resp['startup']] = $startups[$resp['startup']];
            }
        }

        if (count($data) > 0) {
          return $data;
        }else{
          Startup::$message = ['type' => 'danger', 'message' => 'O filtro de ARTICULADOR não retornou dados !'];
          $_SESSION['message'] = ['type' => 'danger', 'message' => 'O filtro de ARTICULADOR não retornou dados !'];
          return $startups;
        }
    }

    public static function getFilterTecnologia($startups)
    {
        $data = [];
        $custom_args['conditions'] =
            [
                ['question', '=', 4],
                ['option', '=', $_GET['tecnologia']],
            ];

        $responses = Query::queryAction('responses', $custom_args);

        foreach ($responses as $resp) {
            if (isset($startups[$resp['startup']])) {
              $data[$resp['startup']] = $startups[$resp['startup']];
            }
        }

        if (count($data) > 0) {
          return $data;
        }else{
          Startup::$message = ['type' => 'danger', 'message' => 'O filtro de TECNOLOGIA não retornou dados !'];
          $_SESSION['message'] = ['type' => 'danger', 'message' => 'O filtro de TECNOLOGIA não retornou dados !'];
          return $startups;
        }
    }

    public static function getFilterCity($startups)
    {
        $data = [];

        foreach ($startups as $s_id => $sttp) {
          if ($_GET['cidade'] == self::clearString($sttp['city'])) {
            $data[$s_id] = $sttp;
          }
        }

        if (count($data) > 0) {
          return $data;
        }else{
          Startup::$message = ['type' => 'danger', 'message' => 'O filtro de CIDADE não retornou dados !'];
          $_SESSION['message'] = ['type' => 'danger', 'message' => 'O filtro de CIDADE não retornou dados !'];
          return $startups;
        }
    }

    public static function getFilterRegion($startups)
    {
          $cities = self::getDataRegions()['cities'];

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
            Startup::$message = ['type' => 'danger', 'message' => 'O filtro de REGIÃO não retornou dados !'];
            $_SESSION['message'] = ['type' => 'danger', 'message' => 'O filtro de REGIÃO não retornou dados !'];
            return $startups;
          }
    }

}
