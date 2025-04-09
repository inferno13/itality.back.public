<?php

namespace App\Http\Controllers\Sklad;

use App\Http\Controllers\Controller;
use App\Models\Sklad;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/sklad/delete",
 *   summary="Удаление фурнитуры",
 *   tags={"Sklad"},
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
 *          @OA\Property(property="message", type="string", example="Фурнитрура не найдена или Фурнитура успешно удалёна."),
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
      $sklad = Sklad::find($data['id']);
      if ($sklad == null) {
          return response()->json(['message' => 'Фурнитура не найдена.']);
      }
      $sklad->delete($data);

      return response()->json(['message' => 'Фурнитура успешно удалёна.']);
  }
}
