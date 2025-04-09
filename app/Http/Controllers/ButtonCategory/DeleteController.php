<?php

namespace App\Http\Controllers\ButtonCategory;

use App\Http\Controllers\Controller;
use App\Models\ButtonCategory;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/button_category/delete",
 *   summary="Удаление Категории Кнопок",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Категория Кнопок не найдена или Категория Кнопок успешно удалёна."),
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
      $button_category = ButtonCategory::find($data['id']);
      if ($button_category == null) {
          return response()->json(['message' => 'Категория Кнопок не найдена.']);
      }

      if ($button_category['image'] != "") {
          Storage::disk('public')->delete($button_category['image']);
      }

      $button_category->delete($data);

      return response()->json(['message' => 'Категория Кнопок успешно удалёна.']);
  }
}
