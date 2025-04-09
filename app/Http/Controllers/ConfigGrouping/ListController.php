<?php

namespace App\Http\Controllers\ConfigGrouping;

use App\Http\Controllers\Controller;
use App\Models\ConfigGrouping;


/**
 * @OA\Get (
 *   path="/api/grouping/list",
 *   summary="Список всей Группировки",
 *   tags={"Grouping"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Группировки не найдена."),
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

      $grouping = ConfigGrouping::all();

      if ($grouping == null) {
          return response()->json(['message' => 'Группировки не найдена.']);
      }

      return $grouping;

  }
}
