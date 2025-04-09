<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;

/**
 * @OA\Post (
 *   path="/api/type/store",
 *   summary="Создание Типа",
 *   tags={"Type"},
 *
 *   @OA\RequestBody(
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
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="title", type="string", example="Машины"),
 *              @OA\Property(property="category_id", type="integer", example=1),
 *        ),
 *        ),
 *    ),
 * )
 * )
 */
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $type = Tag::create($data);

        return $type;
    }
}
