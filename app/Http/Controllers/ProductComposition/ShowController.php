<?php

namespace App\Http\Controllers\ProductComposition;

use App\Http\Controllers\Controller;
use App\Models\ProductComposition;
use Illuminate\Http\Request;

/**
 * @OA\Get (
 *   path="/api/pc/show",
 *   summary="Одиночный Состав Продуктов",
 *   tags={"ProductComposition"},
 *
 *  @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example=1),
 * )
 *   }
 * )
 *   ),
 *
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message.",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="button_id", type="integer", example=20),
 *              @OA\Property(property="product_id", type="integer", example=1),
 *              @OA\Property(property="count", type="integer", example=200),
 *        ),
 *        ),
 *    ),
 * )
 * )
 */
class ShowController extends Controller
{
    public function __invoke(Request $request) {

        $data = $request->input();

        $pc = ProductComposition::find($data['id']);

        if ($pc === null) {
            return json_encode(['message' => 'Такого Состава Продукта не существует.']);
        }

            return json_encode($pc);
    }

}
