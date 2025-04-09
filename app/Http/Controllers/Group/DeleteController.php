<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/group/delete",
 *   summary="Удаление группы",
 *   tags={"Group"},
 *   description="При ошибке возвращается message",
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
 *          @OA\Property(property="message", type="string", example="Група успешно удалена или Группа не найдена."),
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $group = Group::find($data['id']);

    if ($group == null) {
    return response()->json(['message' => 'Группа не найдена.']);
    }

    $group->delete($data);

    Rule::where('group_id', $data['id'])->delete();

    return response()->json(['message' => 'Группа успешно удалена.']);
  }
}
