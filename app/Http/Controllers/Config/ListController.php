<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Resource\ConfigResource;
use App\Models\Config;


/**
 * @OA\Get (
 *   path="/api/config/list",
 *   summary="Список всех конфигураций",
 *   tags={"Config"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
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
 *              @OA\Property(property="message", type="text", example="Конфигурации не найдены."),
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

      $config = Config::all();

      if ($config == null) {
          return response()->json(['message' => 'Конфигурации не найдены.']);
      }

      return $config;
      //return ConfigResource::collection($config);
  }
}
