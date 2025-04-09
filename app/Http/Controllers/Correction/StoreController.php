<?php

namespace App\Http\Controllers\Correction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Correction\StoreRequest;
use App\Models\Correction;


/**
 * @OA\Post(
 *   path="/api/corretion/store",
 *   summary="Создание Корректировки",
 *   tags={"Correction"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="",
 *       in="path",
 *       name="corretion",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="type", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="value", type="integer", example=860480),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="Created /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле обязательно для заполнения."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="type", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="value", type="integer", example=860480),
 *     ),),
 *
 *
 *
 *          )),
 *      ),
 *    ),
 *    ),
 *   )
 * )
 */
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $corretion   = Correction::create($data);

        return $corretion;
    }

}
