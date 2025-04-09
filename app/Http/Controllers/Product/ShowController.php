<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/product/show",
 *   summary="Одиночный Продукт",
 *   tags={"Product"},
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Пользователь не найден."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="pos", type="integer", example=34),
 *              @OA\Property(property="image", type="string", example="product/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="category_id", type="integer", example=2),
 *              @OA\Property(property="title", type="string", example="Jones"),
 *              @OA\Property(property="cash", type="integer", example=5400),
 *              @OA\Property(property="remains", type="integer", example=645),
 *              @OA\Property(property="shipment", type="integer", example=543),
 *              @OA\Property(property="qr", type="string", example="ghd54gfjhgf56"),
 *              @OA\Property(property="color", type="string", example="red"),
 *     * ),
 *              @OA\Property(property="message", type="text", example="Пользователь не найден."),
 * )
 * ),
 *    ),
 *    ),
 *   )
 * )
 */
class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();

      $product = Product::find($data['id']);

      if ($product == null) {
          return response()->json(['message' => 'Пользователь не найден.']);
      }

      return $product;
  }

}
