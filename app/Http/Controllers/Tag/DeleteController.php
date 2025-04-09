<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/type/delete",
 *   summary="Удаление Типа",
 *   description="",
 *   tags={"Type"},
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
 *          @OA\Property(property="message", type="string", example="Тип не найдена.  или Тип  успешно удалён."),
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
    public function __invoke(Request $request) {

        $data = $request->input();

        $typeDelete = Tag::find($data['id']);

        if(empty($typeDelete)) {
            return json_encode(['message' => 'Тэг не найден, неверное ID или тип.']);
        }

        $typeDelete->delete();

        return json_encode(['message' => 'Тэг успешно удалено.']);
    }

}
