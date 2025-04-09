<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


/**
 * @OA\Post(
 *   path="/api/product/update",
 *   summary="Изменение Продукта",
 *   tags={"Product"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       description=".",
 *       in="path",
 *       name="Bearer Token",
 *       required=true,
 *       example=""
 *   ),
 *
 *   @OA\RequestBody(
 *
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="pos", type="integer", example=34),
 *              @OA\Property(property="image", type="file/string", example="product/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="category_id", type="integer", example=2),
 *              @OA\Property(property="title", type="string", example="Jones"),
 *              @OA\Property(property="cash", type="integer", example=5400),
 *              @OA\Property(property="remains", type="integer", example=645),
 *              @OA\Property(property="shipment", type="integer", example=543),
 *              @OA\Property(property="qr", type="string", example="ghd54gfjhgf56"),
 *              @OA\Property(property="color", type="string", example="red"),
 *       ),
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
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
 *
 *              @OA\Property(property="message", type="text", example="Продукт не найден."),
 * ),
 * )
 * ),
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

        $product = Product::find($data['id']);

        if ($product == null) {
            return response()->json(['message' => 'Продукт не найден.']);
        }

        if (isset($data['image']) && !is_file($data['image']) && !is_string($data['image'])) {
            return json_encode(['message' => 'В данное поле нужно загрузить файл или строчный тип данных.']);
        }

        if (empty($data['image']) && $product['image'] != "") {
            Storage::disk('public')->delete($product['image']);
            $data['image'] = null;
          }

        if (isset($data['image']) && is_string($data['image'])) {
            if($product['image'] != "")
            {
                Storage::disk('public')->delete($product['image']);
            }
            $copy = 'product/' . Str::random() . explode('/', $data['image'])[1];
            $file = 'public/'.$data['image'];
            $success = Storage::copy($file, 'public/'.$copy);
            if ($success) {
                $data['image'] = $copy;
            }
        }

        if (isset($data['image']) && is_file($data['image'])) {
            if($product['image'] != "")
            {
                Storage::disk('public')->delete($product['image']);
            }
            $data['image'] = Storage::disk('public')->put('product', $data['image']);
        }

        $product->update($data);

        return $product;
    }
}
