<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/category/delete",
 *   summary="Удаление категории",
 *   tags={"Category"},
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
 *          @OA\Property(property="message", type="string", example="Категория не найдена или Категория успешно удалёна"),
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
      $category = Category::find($data['id']);
      if ($category == null) {
          return response()->json(['message' => 'Категория не найдена.']);
      }

      if ($category['image'] != "") {
          Storage::disk('public')->delete($category['image']);
      }
      $category->delete($data);

      return response()->json(['message' => 'Категория успешно удалёна.']);
  }
}
