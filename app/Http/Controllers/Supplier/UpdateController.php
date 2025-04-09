<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\UpdateRequest;
use App\Models\Supplier;


/**
 * @OA\Post(
 *   path="/api/supplier/update",
 *   summary="Изменение Поставщика",
 *   tags={"Supplier"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="supplier",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 *                    @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *                    @OA\Property(property="title", type="string", example=860480), * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле для даты."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="title", type="string", example=860480),
 *
 *              @OA\Property(property="message", type="text", example="Поставщик не найдена."),
 *      )),
 *   ),
 *    ),
 *    ),
 *   )
 * )
 */
class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
    $data = $request->validated();

      $supplier = Supplier::find($data['id']);
      if ($supplier == null) {
          return response()->json(['message' => 'Поставщик не найдена.']);
      }
    $supplier->update($data);

    $supplier = Supplier::find($supplier->id);

      return $supplier;
  }
}
