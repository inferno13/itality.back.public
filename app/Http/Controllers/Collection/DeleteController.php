<?php

namespace App\Http\Controllers\Collection;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/collection/delete",
 *   summary="Удаление Коллекции",
 *   tags={"Collection"},
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
 *          @OA\Property(property="message", type="string", example="Коллекция не найдена или Коллекция успешно удалёна."),
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
      $collection = Collection::find($data['id']);
      if ($collection == null) {
          return response()->json(['message' => 'Коллекция не найдена.']);
      }
      $collection->delete($data);

      return response()->json(['message' => 'Коллекция успешно удалёна.']);
  }
}
