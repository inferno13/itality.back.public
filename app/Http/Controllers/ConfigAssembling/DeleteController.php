<?php

namespace App\Http\Controllers\ConfigAssembling;

use App\Http\Controllers\Controller;
use App\Models\ConfigAssembling;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/config_assembling/delete",
 *   summary="Удаление Конфигурационной Сборки",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Конфигурационная сборка не найдена или Конфигурационная сборка успешно удалёна."),
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
      $config_assembling = ConfigAssembling::find($data['id']);
      if ($config_assembling == null) {
          return response()->json(['message' => 'Конфигурационная сборка не найдена.']);
      }

      if ($config_assembling['image'] != "") {
          Storage::disk('public')->delete($config_assembling['image']);
      }

      $config_assembling->delete($data);

      return response()->json(['message' => 'Конфигурационная сборка успешно удалена.']);
  }
}
