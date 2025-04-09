<?php

namespace App\Http\Controllers\ConfigAssembling;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigAssembling\StoreRequest;
use App\Models\ConfigAssembling;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/config_assembling/store",
 *   summary="Создание Конфигурационной Сборки",
 *   tags={"ConfigAssembling"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="",
 *       in="path",
 *       name="config_assembling",
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

    if (isset($data['image']) && is_file($data['image'])) {
        $data['image'] = Storage::disk('public')->put('config/assembling', $data['image']);
    }

    $config_assembling = ConfigAssembling::create($data);

      return $config_assembling;
  }

}
