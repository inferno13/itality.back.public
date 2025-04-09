<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resource\CategoryResource;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/category/show",
 *   summary="Одиночныая категория",
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
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Категория не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=900),
 *              @OA\Property(property="parent_id", type="integer", example=20),
 *              @OA\Property(property="tab_id", type="integer", example=10),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="string", example="image.png"),*
 *
 *
 *              @OA\Property(property="message", type="text", example="Категория не найдена."),
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

      $category = Category::where('id', $data['id'])->first(); // Используем first() вместо get()

      if ($category === null) {
          return response()->json(['message' => 'Категория не найдена.']);
      }

      return response()->json($category); // Возвращаем объект в формате {...data}
  }
}
