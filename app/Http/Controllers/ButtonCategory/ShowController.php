<?php

namespace App\Http\Controllers\ButtonCategory;

use App\Http\Controllers\Controller;
use App\Models\ButtonCategory;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/button_category/show",
 *   summary="Одина Категория Кнопок",
 *   tags={"ButtonCategory"},
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
 *          @OA\Property(property="message", type="string", example="Категория Кнопок не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="title", type="string", example=860480),
 *              @OA\Property(property="color", type="string", example="red"),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Категория Кнопок не найдена."),
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

    $button_category = ButtonCategory::where('id', $data['id'])->first();

    if ($button_category === null) {
      return response()->json(['message' => 'Категория Кнопок не найдена.']);
    }

    return response()->json($button_category);
  }
}
