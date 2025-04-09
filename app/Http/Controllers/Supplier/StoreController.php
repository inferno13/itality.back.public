<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreRequest;
use App\Models\Supplier;


/**
 * @OA\Post(
 *   path="/api/supplier/store",
 *   summary="Создание Поставщика",
 *   tags={"Supplier"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="",
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
 *              @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="title", type="string", example=860480),
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
 *              @OA\Property(property="pos", type="integer", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="title", type="string", example=860480),
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

        $supplier   = Supplier::create($data);

        return $supplier;
    }

}
