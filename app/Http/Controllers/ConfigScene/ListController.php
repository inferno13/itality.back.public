<?php

namespace App\Http\Controllers\ConfigScene;

use App\Http\Controllers\Controller;
use App\Models\ConfigScene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @OA\Get (
 *   path="/api/config_scene/list",
 *   summary="Список всех Конфигурационная Сцен",
 *   tags={"ConfigScene"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message. Путь к изображениям storage/public/(сюда то-что с бека пришло)",
 *      @OA\JsonContent(
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
 *              @OA\Property(property="message", type="text", example="Конфигурационная Сцены не найдены."),
 *
 * ),
 *        ),
 *    ),
 * )
 * )
 */
class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');


    $config_scene = ConfigScene::all();

      if ($id) {
          $config_scene = $config_scene->where('config_id', $id)->values()->toArray();
      }

      Log::info("Конфигурациия", ['id' => $id, 'config_scene' => $config_scene]);

      if ($config_scene == null) {
          return response()->json(['message' => 'Конфигурационная Сцены не найдены.']);
      }

      return $config_scene;
  }
}
