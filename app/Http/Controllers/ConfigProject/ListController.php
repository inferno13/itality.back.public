<?php

namespace App\Http\Controllers\ConfigProject;

use App\Http\Controllers\Controller;
use App\Models\ConfigProject;


/**
 * @OA\Get (
 *   path="/api/config_project/list",
 *   summary="Список всех Конфигурационных Проектов",
 *   tags={"ConfigProject"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message. Путь к изображениям storage/public/(сюда то-что с бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="string", example="1"),
 *              @OA\Property(property="coord_x", type="integer", example=565),
 *              @OA\Property(property="coord_y", type="integer", example=565),
 *              @OA\Property(property="turn", type="integer", example=565),
 *              @OA\Property(property="scheme", type="string", example="config/project/DFG9345LKJN5456.jpg"),
 *              @OA\Property(property="walkin", type="string", example="config/project/DFG9345LKJN5456.jpg"),
 *              @OA\Property(property="select_1", type="string", example="string"),
 *              @OA\Property(property="value_1", type="integer", example=565),
 *              @OA\Property(property="select_2", type="string", example="string"),
 *              @OA\Property(property="select_3", type="string", example="string"),
 *              @OA\Property(property="value_2", type="integer", example=565),
 *              @OA\Property(property="select_4", type="string", example="string"),
 *              @OA\Property(property="select_5", type="string", example="string"),
 *              @OA\Property(property="select_6", type="string", example="string"),
 *              @OA\Property(property="select_7", type="string", example="string"),
 *              @OA\Property(property="select_8", type="string", example="string"),
 *              @OA\Property(property="select_9", type="string", example="string"),
 *              @OA\Property(property="select_10", type="string", example="string"),
 *              @OA\Property(property="select_11", type="string", example="string"),
 *              @OA\Property(property="value_3", type="integer", example=565),
 *              @OA\Property(property="select_12", type="string", example="string"),
 *              @OA\Property(property="select_13", type="string", example="string"),
 *              @OA\Property(property="select_14", type="string", example="string"),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Конфигурационные Проекты не найдены."),
 *
 * ),
 *        ),
 *    ),
 * )
 * )
 */
class ListController extends Controller
{
  public function __invoke()
  {

      $config_project = ConfigProject::all();

      if ($config_project == null) {
          return response()->json(['message' => 'Конфигурационные Проекты не найдены.']);
      }

      return $config_project;
  }
}
