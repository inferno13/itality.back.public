<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\Config\StoreRequest;
use App\Models\Config;

/**
 * @OA\Post(
 *   path="/api/config/store",
 *   summary="Создание конфигурации",
 *   tags={"Config"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="Обязательно только data_start_work, counterparty, cars, status остальные атрибуты нет.",
 *       in="path",
 *       name="config",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
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
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="Created /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле обязательно для заполнения."),
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
 *     ),),
 *
 *
 *
 *              @OA\Property(property="message1", type="text", example="Конфигурация не найдена."),
 *          )),
 *      ),
 *    ),
 *    ),
 *   )
 * )
 */
class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $config = Config::create($data);

      return $config;
  }

}
