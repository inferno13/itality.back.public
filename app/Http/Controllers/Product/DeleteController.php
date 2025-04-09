<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/product/delete",
 *   summary="Удаление Продукт",
 *   description="При ошибке возвращается message.",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Продукт не найден или Продукт успешно удалён."),
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $product = Product::find($data['id']);

      if ($product == null) {
          return response()->json(['message' => 'Продукт не найден.']);
      }

      if ($product->id == 1) {
          return response()->json(['message' => 'Пользователя нельзя удалить.']);
      }

      if ($product['image'] != "") {
          Storage::disk('public')->delete($product['image']);
      }

      $product->delete($data);

      return response()->json(['message' => 'Продукт успешно удалён.']);
  }
}
