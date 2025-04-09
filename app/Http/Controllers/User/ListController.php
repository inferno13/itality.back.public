<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resource\UserResource;
use App\Models\Group;
use App\Models\User;
/**
 * @OA\Get (
 *   path="/api/user/list",
 *   summary="Список всех пользователей",
 *   tags={"User"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
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
 *   ),
 *              @OA\Property(property="message", type="text", example="Пользователи не найдены."),
 * ),
 *   ),
 *        ),
 *    ),
 * )
 * )
 */
class ListController extends Controller
{
  public function __invoke()
  {


      $users = User::all();
      if ($users == null) {
          return response()->json(['message' => 'Пользователи не найдены.']);
      }

      $usersGroups = User:://join('groups','groups.id','=','users.group_id')
          leftjoin('groups', function($join){
              $join->on('users.group_id','=','groups.id');
              //$join->orWhereNull('users.group_id');
          })
          ->select('users.*', 'groups.name as group_name')
          ->get();

      return $usersGroups;
      //return UserResource::collection($usersGroups);
  }
}
