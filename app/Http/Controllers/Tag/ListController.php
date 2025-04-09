<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
/**
 * @OA\Get (
 *   path="/api/type/list",
 *   summary="Список всех Типов",
 *   tags={"Type"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message.",
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
class ListController extends Controller
{
    public function __invoke()
    {
        $types = Tag::all();

        return $types;
    }
}
