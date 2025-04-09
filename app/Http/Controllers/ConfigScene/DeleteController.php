<?php

namespace App\Http\Controllers\ConfigScene;

use App\Http\Controllers\Controller;
use App\Models\ConfigScene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/config_scene/delete",
 *   summary="Удаление Конфигурационная Сцена",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Конфигурационная Сцена не найдена или Конфигурационная Сцена успешно удалёна."),
 *
 *
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $config_scene = ConfigScene::find($data['id']);
      if ($config_scene == null) {
          return response()->json(['message' => 'Конфигурационная Сцена не найдена.']);
      }

      if ($config_scene == null) {
          return response()->json(['message' => 'Конфигурационная Сцена не найдена.']);
      }

      $config_scene->delete($data);

      return response()->json(['message' => 'Конфигурационная Сцена успешно удалена.']);
  }
}
