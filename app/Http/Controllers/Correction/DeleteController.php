<?php

namespace App\Http\Controllers\Correction;

use App\Http\Controllers\Controller;
use App\Models\Correction;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/correction/delete",
 *   summary="Удаление Корректировка",
 *   tags={"Correction"},
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
 *          @OA\Property(property="message", type="string", example="Корректировка не найдена или Корректировка успешно удалёна."),
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
      $correction = Correction::find($data['id']);
      if ($correction == null) {
          return response()->json(['message' => 'Корректировка не найдена.']);
      }
      $correction->delete($data);

      return response()->json(['message' => 'Корректировка успешно удалёна.']);
  }
}
