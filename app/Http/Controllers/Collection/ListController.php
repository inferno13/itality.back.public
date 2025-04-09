<?php

namespace App\Http\Controllers\Collection;

use App\Http\Controllers\Controller;
use App\Models\Collection;


/**
 * @OA\Get (
 *   path="/api/collection/list",
 *   summary="Список всей Коллекция",
 *   tags={"Collection"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="title", type="string", example=860480),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Коллекция не найдена."),
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

      $collection = Collection::all();

      if ($collection == null) {
          return response()->json(['message' => 'Коллекция не найдена.']);
      }

      return $collection;

  }
}
