<?php

namespace App\Http\Controllers\Correction;

use App\Http\Controllers\Controller;
use App\Models\Correction;


/**
 * @OA\Get (
 *   path="/api/correction/list",
 *   summary="Список всех Корректировок",
 *   tags={"Correction"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="type", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="value", type="integer", example=860480),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Коректировки не найдены."),
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

      $correction = Correction::all();

      if ($correction == null) {
          return response()->json(['message' => 'Коректировки не найдены.']);
      }

      return $correction;

  }
}
