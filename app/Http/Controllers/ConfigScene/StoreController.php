<?php

namespace App\Http\Controllers\ConfigScene;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigScene\StoreRequest;
use App\Models\ConfigScene;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/config_scene/store",
 *   summary="Создание Конфигурационная Сцена",
 *   tags={"ConfigScene"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="Обязательно только data_start_work, counterparty, cars, status остальные атрибуты нет.",
 *       in="path",
 *       name="config_scene",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="type", type="string", example="word"),
 *              @OA\Property(property="button", type="file", example="image.jpg"),
 *              @OA\Property(property="scene_left", type="file", example="image.jpg"),
 *              @OA\Property(property="scene_right", type="file", example="image.jpg"),
 *              @OA\Property(property="mask_left", type="file", example="image.jpg"),
 *              @OA\Property(property="mask_right", type="file", example="image.jpg"),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="Created /При ошибке возвращается message. Путь к изображениям storage/public/(сюда то-что с бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле обязательно для заполнения."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="type", type="string", example="word"),
 *              @OA\Property(property="button", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="scene_left", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="scene_right", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="mask_left", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="mask_right", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
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
    if (isset($data['button']) && is_file($data['button'])) {
        $data['button'] = Storage::disk('public')->put('config/scene', $data['button']);
    }

    if (isset($data['scene_left']) && is_file($data['scene_left'])) {
        $data['scene_left'] = Storage::disk('public')->put('config/scene', $data['scene_left']);
    }

    if (isset($data['scene_right']) && is_file($data['scene_right'])) {
        $data['scene_right'] = Storage::disk('public')->put('config/scene', $data['scene_right']);
    }

    if (isset($data['mask_left']) && is_file($data['mask_left'])) {
        $data['mask_left'] = Storage::disk('public')->put('config/scene', $data['mask_left']);
    }

    if (isset($data['mask_right']) && is_file($data['mask_right'])) {
        $data['mask_right'] = Storage::disk('public')->put('config/scene', $data['mask_right']);
    }

    $config_scene = ConfigScene::create($data);

      return $config_scene;
  }

}
