<?php

namespace App\Http\Controllers\ProductComposition;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductComposition\UpdateRequest;
use App\Models\ProductComposition;

/**
 * @OA\Post (
 *   path="/api/pc/update",
 *   summary="Обновление Состава Продукта",
 *   tags={"ProductComposition"},
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="button_id", type="integer", example=20),
 *              @OA\Property(property="product_id", type="integer", example=1),
 *              @OA\Property(property="count", type="integer", example=200),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message.",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="button_id", type="integer", example=20),
 *              @OA\Property(property="product_id", type="integer", example=1),
 *              @OA\Property(property="count", type="integer", example=200), *        ),
 *        ),
 *    ),
 * )
 * )
 */

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request)
   {
        $data = $request->validated();

        $pc = ProductComposition::find($data['id']);

        $pc->update($data);

        return json_encode($pc);
    }
}
