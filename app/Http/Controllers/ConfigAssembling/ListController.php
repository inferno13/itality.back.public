<?php

namespace App\Http\Controllers\ConfigAssembling;

use App\Http\Controllers\Controller;
use App\Models\ConfigAssembling;


/**
 * @OA\Get (
 *   path="/api/config_assembling/list",
 *   summary="Список всех Конфигурационных Сборок",
 *   tags={"ConfigAssembling"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message. Путь к изображениям storage/public/(сюда то-что с бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="string", example="1"),
 *              @OA\Property(property="type", type="integer", example=34),
 *              @OA\Property(property="pos", type="string", example="dsafdd"),
 *              @OA\Property(property="group", type="string", example="users"),
 *              @OA\Property(property="name", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="cash", type="string", example=45),
 *              @OA\Property(property="image", type="string", example="config/assembling/KJLN4654NLN54.jpg"),
 *              @OA\Property(property="ishower_on", type="boolean", example="true/false"),
 *              @OA\Property(property="ishower_default", type="boolean", example="true/false"),
 *              @OA\Property(property="dushmaster_on", type="boolean", example="true/false"),
 *              @OA\Property(property="dushmaster_default", type="boolean", example="true/false"),
 *              @OA\Property(property="itality_on", type="boolean", example="true/false"),
 *              @OA\Property(property="itality_default", type="boolean", example="true/false"),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Конфигурационные Сборки не найдены."),
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

      $config_assembling = ConfigAssembling::all();

      if ($config_assembling == null) {
          return response()->json(['message' => 'Конфигурационные Сборки не найдены.']);
      }

      return $config_assembling;
  }
}
