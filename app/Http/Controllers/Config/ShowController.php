<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Resource\ConfigResource;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/config/show",
 *   summary="Одиночная конфигурация",
 *   tags={"Config"},
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
 *          @OA\Property(property="message", type="string", example="Конфигурация не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="active", type="boolean", example="true/false"),
 *              @OA\Property(property="pos", type="integer", example=45),
 *              @OA\Property(property="group", type="string", example="users"),
 *              @OA\Property(property="name", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="scene_id", type="integer", example=45),
 *              @OA\Property(property="assembling_id", type="integer", example=45),
 *              @OA\Property(property="col", type="integer", example=45),
 *              @OA\Property(property="view", type="string", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *              @OA\Property(property="type", type="string", example="word"),
 *              @OA\Property(property="project_id", type="integer", example=45),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Конфигурация не найдена."),
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

    $config = Config::where('id', $data['id'])->first();

    if ($config === null) {
      return response()->json(['message' => 'Конфигурация не найдена.']);
    }

    return response()->json($config);
  }
}
