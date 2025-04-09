<?php

namespace App\Http\Controllers\ConfigGrouping;

use App\Http\Controllers\Controller;
use App\Models\ConfigGrouping;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/grouping/delete",
 *   summary="Удаление Группировки",
 *   tags={"Grouping"},
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
 *          @OA\Property(property="message", type="string", example="Группировка не найдена или Группировка успешно удалёна."),
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
      $grouping = ConfigGrouping::find($data['id']);
      if ($grouping == null) {
          return response()->json(['message' => 'Группировка не найдена.']);
      }
      $grouping->delete($data);

      return response()->json(['message' => 'Группировка успешно удалёна.']);
  }
}
