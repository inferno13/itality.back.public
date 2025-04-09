<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;


/**
 * @OA\Get (
 *   path="/api/supplier/list",
 *   summary="Список всей Поставщков",
 *   tags={"Supplier"},
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
 *              @OA\Property(property="message", type="text", example="Поставщики не найдена."),
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

      $supplier = Supplier::all();

      if ($supplier == null) {
          return response()->json(['message' => 'Поставщики не найдена.']);
      }

      return $supplier;

  }
}
