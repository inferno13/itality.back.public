<?php

namespace App\Http\Controllers\Grouping;

use App\Http\Controllers\Controller;
use App\Http\Requests\Grouping\UpdateRequest;
use App\Models\Grouping;


/**
 * @OA\Post(
 *   path="/api/grouping/update",
 *   summary="Изменение Группировки",
 *   tags={"Grouping"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="grouping",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="title", type="string", example=860480), * )
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
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *
 *
 *              @OA\Property(property="message", type="text", example="Группировки не найдена."),
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

      $grouping = Grouping::find($data['id']);
      if ($grouping == null) {
          return response()->json(['message' => 'Группировки не найдена.']);
      }
    $grouping->update($data);

    $grouping = Grouping::find($grouping->id);

      return $grouping;
  }
}
