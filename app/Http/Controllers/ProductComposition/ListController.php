<?php

namespace App\Http\Controllers\ProductComposition;

use App\Http\Controllers\Controller;
use App\Models\ProductComposition;

/**
 * @OA\Get (
 *   path="/api/pc/list",
 *   summary="Список всех Составов Продуктов",
 *   tags={"ProductComposition"},
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
class ListController extends Controller
{
    public function __invoke()
    {
        $pcs = ProductComposition::all();

        return $pcs;
    }
}
