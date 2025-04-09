<?php

namespace App\Http\Controllers\Correction;

use App\Http\Controllers\Controller;
use App\Models\Correction;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/correction/show",
 *   summary="Одиночный Корректировка",
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
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Коректировка не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="type", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="value", type="integer", example=860480),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Корректировка не найдена."),
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

    $correction = Correction::where('id', $data['id'])->first();

    if ($correction === null) {
      return response()->json(['message' => 'Корректировка не найдена.']);
    }

    return response()->json($correction);
  }
}
