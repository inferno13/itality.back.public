<?php

namespace App\Http\Controllers\Correction;

use App\Http\Controllers\Controller;
use App\Models\Correction;
use App\Http\Requests\Correction\UpdateRequest;


/**
 * @OA\Post(
 *   path="/api/correction/update",
 *   summary="Изменение Корректировки",
 *   tags={"Correction"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="correction",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 *                    @OA\Property(property="type", type="string", example="Prof. Jakayla Cummings Sr."),
 *                    @OA\Property(property="value", type="integer", example=860480), * )
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
 *              @OA\Property(property="type", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="value", type="integer", example=860480),
 *
 *              @OA\Property(property="message", type="text", example="Корректировка не найдена."),
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

      $correction = Correction::find($data['id']);
      if ($correction == null) {
          return response()->json(['message' => 'Поставщик не найдена.']);
      }
      $correction->update($data);

      return $correction;
  }
}
