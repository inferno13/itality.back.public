<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;

/**
 * @OA\Post (
 *   path="/api/type/update",
 *   summary="Обновление Типа",
 *   tags={"Type"},
 *
 *    @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Машины"),
 *              @OA\Property(property="category_id", type="integer", example=1),
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
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Машины"),
 *              @OA\Property(property="category_id", type="integer", example=1), *        ),
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
        $type = Tag::find($data['id']);

        if ($type == null) {
            return json_encode(['message' => 'Такого Тэга не существует.']);
        }

        $type->update($data);

        return json_encode($type);
    }
}
