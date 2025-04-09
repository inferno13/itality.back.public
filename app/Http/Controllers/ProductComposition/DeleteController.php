<?php

namespace App\Http\Controllers\ProductComposition;

use App\Http\Controllers\Controller;
use App\Models\ProductComposition;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/pc/delete",
 *   summary="Удаление Состава Продукта",
 *   description="",
 *   tags={"ProductComposition"},
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example=1),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Состав Продукта Продукта не найдена.  или  Состав Продукта Продукта успешно удалён."),
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
    public function __invoke(Request $request) {

        $data = $request->input();

        $pcDelete = ProductComposition::find($data['id']);

        if(empty($pcDelete)) {
            return json_encode(['message' => 'Состав Продукта не найдена, неверное ID или тип.']);
        }

        $pcDelete->delete();

        return json_encode(['message' => 'Состав Продукта успешно удалено.']);
    }

}
