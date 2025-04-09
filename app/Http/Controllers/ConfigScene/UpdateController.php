<?php

namespace App\Http\Controllers\ConfigScene;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigScene\UpdateRequest;
use App\Models\ConfigScene;
use Illuminate\Support\Facades\Storage;


/**
 * @OA\Post(
 *   path="/api/config_scene/update",
 *   summary="Изменение Конфигурационная Сцена",
 *   tags={"ConfigScene"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
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
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="type", type="string", example="word"),
 *              @OA\Property(property="button", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="scene_left", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="scene_right", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="mask_left", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="mask_right", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message. Путь к изображениям storage/public/(сюда то-что с бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле для даты."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="type", type="string", example="word"),
 *              @OA\Property(property="button", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="scene_left", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="scene_right", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="mask_left", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *              @OA\Property(property="mask_right", type="string", example="config/scene/LKDJ65LKJHVBJHFUJ4.jpg"),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Конфигурационная Сцена не найдена."),
 *      )),
 *   ),
 *    ),
 *    ),
 *   )
 * )
 */
class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
    $data = $request->validated();

      $config_scene = ConfigScene::find($data['id']);
      if ($config_scene == null) {
          return response()->json(['message' => 'Конфигурационная Сцена не найдена.']);
      }

      if (isset($data['button']) && is_file($data['button'])) {
          if($config_scene['button'] != "")
          {
              Storage::disk('public')->delete($config_scene['button']);
          }
          $data['button'] = Storage::disk('public')->put('config/scene', $data['button']);
      }

      if (isset($data['scene_left']) && is_file($data['scene_left'])) {
          if($config_scene['scene_left'] != "")
          {
              Storage::disk('public')->delete($config_scene['scene_left']);
          }
          $data['scene_left'] = Storage::disk('public')->put('config/scene', $data['scene_left']);
      }

      if (isset($data['scene_right']) && is_file($data['scene_right'])) {
          if($config_scene['scene_right'] != "")
          {
              Storage::disk('public')->delete($config_scene['scene_right']);
          }
          $data['scene_right'] = Storage::disk('public')->put('config/scene', $data['scene_right']);
      }

      if (isset($data['mask_left']) && is_file($data['mask_left'])) {
          if($config_scene['mask_left'] != "")
          {
              Storage::disk('public')->delete($config_scene['mask_left']);
          }
          $data['mask_left'] = Storage::disk('public')->put('config/scene', $data['mask_left']);
      }

      if (isset($data['mask_right']) && is_file($data['mask_right'])) {
          if($config_scene['mask_right'] != "")
          {
              Storage::disk('public')->delete($config_scene['mask_right']);
          }
          $data['mask_right'] = Storage::disk('public')->put('config/scene', $data['mask_right']);
      }

    $config_scene->update($data);

    $config_scene = ConfigScene::find($config_scene->id);

      return $config_scene;
      //return ConfigScene\Resource::collection($config_scene);
  }
}
