<?php

namespace App\Http\Controllers\ConfigScene;

use App\Http\Controllers\Controller;
use App\Models\ConfigScene;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/config_scene/show",
 *   summary="Одиночная Конфигурационная Сцена",
 *   tags={"ConfigScene"},
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
 *      description="OK /При ошибке возвращается message. Путь к изображениям storage/public/(сюда то-что с бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Конфигурационная Сцена не найдена."),
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

    $config_scene = ConfigScene::find($data['id']);

    if ($config_scene === null) {
      return response()->json(['message' => 'Конфигурационная Сцена не найдена.']);
    }

    return response()->json($config_scene);
  }
}
