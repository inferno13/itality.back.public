<?php

namespace App\Http\Controllers\ButtonCategory;

use App\Http\Controllers\Controller;
use App\Models\ButtonCategory;


/**
 * @OA\Get (
 *   path="/api/button_category/list",
 *   summary="Список всех Категорий Кнопок",
 *   tags={"ButtonCategory"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="color", type="string", example="red"),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Категории Кнопок не найдена."),
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

      $button_category = ButtonCategory::all();

      if ($button_category == null) {
          return response()->json(['message' => 'Категории Кнопок не найдена.']);
      }

      return $button_category;

  }
}
