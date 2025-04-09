<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/user/delete",
 *   summary="Удаление пользователя",
 *   description="С role superadmin нельзя удалить. При ошибке возвращается message.",
 *   tags={"User"},
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
 *          @OA\Property(property="message", type="string", example="Пользователь не найден или Пользователь успешно удалён."),
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $user = User::find($data['id']);

      if ($user == null) {
          return response()->json(['message' => 'Пользователь не найден.']);
      }

      if ($user->id == 1) {
          return response()->json(['message' => 'Пользователя нельзя удалить.']);
      }

      if ($user['avatar'] != "") {
          Storage::disk('public')->delete($user['avatar']);
      }

      if ($user['pasport1'] != "") {
          Storage::disk('public')->delete($user['pasport1']);
      }

      if ($user['pasport2'] != "") {
          Storage::disk('public')->delete($user['pasport2']);
      }

      $user->delete($data);

      return response()->json(['message' => 'Пользователь успешно удалён.']);
  }
}
