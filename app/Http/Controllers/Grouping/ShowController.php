<?php

namespace App\Http\Controllers\Grouping;

use App\Http\Controllers\Controller;
use App\Models\Grouping;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/grouping/show",
 *   summary="Одина Группировки",
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
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Группировки не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Группировки не найдена."),
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

    $grouping = Grouping::where('id', $data['id'])->first();

    if ($grouping === null) {
      return response()->json(['message' => 'Группировки не найдена.']);
    }

    return response()->json($grouping);
  }
}
