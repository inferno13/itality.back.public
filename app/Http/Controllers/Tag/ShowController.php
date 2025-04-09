<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

/**
 * @OA\Get (
 *   path="/api/type/show",
 *   summary="Одиночный Тип",
 *   tags={"Type"},
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
 *              @OA\Property(property="title", type="string", example="String"),
 *              @OA\Property(property="category_id", type="integer", example=1),
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

        $type = Tag::find($data['id']);

        if ($type === null) {
            return json_encode(['message' => 'Такого Состава Продукта не существует.']);
        }

            return json_encode($type);
    }

}
