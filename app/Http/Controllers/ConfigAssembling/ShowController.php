<?php

namespace App\Http\Controllers\ConfigAssembling;

use App\Http\Controllers\Controller;
use App\Models\ConfigAssembling;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/config_assembling/show",
 *   summary="Одиночная Конфигурационная Сборка",
 *   tags={"ConfigAssembling"},
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Конфигурационная Сборка не найдена."),
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
 *              @OA\Property(property="message", type="text", example="Конфигурационная Сборка не найдена."),
 *   )),
 *   ),
 *    ),
 *    ),
 *   )
 * )
 */
class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $config_assembling = ConfigAssembling::find($data['id']);

    if ($config_assembling === null) {
      return response()->json(['message' => 'Конфигурационная Сборка не найдена.']);
    }

    return response()->json($config_assembling);
  }
}
