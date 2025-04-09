<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;


/**
 * @OA\Get (
 *   path="/api/category/list",
 *   summary="Список всех категорий",
 *   tags={"Category"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=900),
 *              @OA\Property(property="parent_id", type="integer", example=20),
 *              @OA\Property(property="tab_id", type="integer", example=10),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="string", example="image.png"),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Категории не найдены."),
 *
 * ),
 *        ),
 *    ),
 * )
 * )
 */
class ListController extends Controller
{
  public function __invoke()
  {

      $category = Category::all();

      if ($category == null) {
          return response()->json(['message' => 'Категории не найдены.']);
      }

      return $category;
  }
}
