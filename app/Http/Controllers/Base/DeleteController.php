<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\Base;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/base/delete",
 *   summary="Удаление строки",
 *   tags={"Base"},
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
 *          @OA\Property(property="message", type="string", example="Заказ не найдена или Заказ успешно удалён."),
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
      $base = Base::find($data['id']);

      if ($base['image'] != "") {
          Storage::disk('public')->delete($base['image']);
      }

      if ($base == null) {
          return response()->json(['message' => 'Позиция не найдена.']);
      }
      $base->delete($data);

      return response()->json(['message' => 'Позиция успешно удалена.']);
  }
}
