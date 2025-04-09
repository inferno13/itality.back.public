<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/config/delete",
 *   summary="Удаление конфигурации",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Конфигурация не найдена или Конфигурация успешно удалёна."),
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
      $config = Config::find($data['id']);
      if ($config == null) {
          return response()->json(['message' => 'Конфигурация не найдена.']);
      }
      $config->delete($data);

      return response()->json(['message' => 'Конфигурация успешно удалена.']);
  }
}
