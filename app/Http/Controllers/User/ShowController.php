<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resource\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/user/show",
 *   summary="Одиночный пользователь",
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
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Пользователь не найден."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="avatar", type="string", example="avatar/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="name", type="string", example="Chris"),
 *              @OA\Property(property="surname", type="string", example="Paul"),
 *              @OA\Property(property="pathname", type="string", example="Jones"),
 *              @OA\Property(property="gender", type="string", example="female/male"),
 *              @OA\Property(property="birthdate", type="date", example="01.01.2000"),
 *              @OA\Property(property="email", type="email", example="chris@gmail.com"),
 *              @OA\Property(property="phone", type="integer", example="4356436346"),
 *              @OA\Property(property="mobile", type="string", example="4356436346"),
 *              @OA\Property(property="pasport1", type="string", example="pasport1/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="pasport2", type="string", example="pasport2/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="group", type="array", @OA\Items(
 *                                                                @OA\Property(property="group_id", type="integer", example="1"),
 *                                                                @OA\Property(property="group_name", type="string", example="Группа Б"),
 * ),
 *              @OA\Property(property="message", type="text", example="Пользователь не найден."),
 * )
 * ),
 *    ),
 *    ),
 *   )
 * )
 */
class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();

      $user = User::find($data['id']);

      if ($user == null) {
          return response()->json(['message' => 'Пользователь не найден.']);
      }

      $userGroup = User:://join('groups','groups.id','=','users.group_id')
          leftjoin('groups', function ($join) {
              $join->on('users.group_id', '=', 'groups.id');
              //$join->orWhereNull('users.group_id');
          })
          ->select('users.*', 'groups.name as group_name')
          ->where('users.id', $data['id'])
          ->first();
          //->get();

      return $userGroup;
      //return UserResource::collection($userGroup);

  }

}
