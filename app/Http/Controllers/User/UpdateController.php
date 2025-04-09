<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resource\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


/**
 * @OA\Post(
 *   path="/api/user/update",
 *   summary="Изменение пользователя",
 *   tags={"User"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="user",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="avatar", type="file", example="avatar.jpg"),
 *              @OA\Property(property="name", type="string", example="Chris"),
 *              @OA\Property(property="surname", type="string", example="Paul"),
 *              @OA\Property(property="pathname", type="string", example="Jones"),
 *              @OA\Property(property="gender", type="string", example="female/male"),
 *              @OA\Property(property="birthdate", type="date", example="01.01.2000"),
 *              @OA\Property(property="email", type="email", example="chris@gmail.com"),
 *              @OA\Property(property="phone", type="integer", example="4356436346"),
 *              @OA\Property(property="mobile", type="string", example="4356436346"),
 *              @OA\Property(property="pasport1", type="file", example="pasport1.jpg"),
 *              @OA\Property(property="pasport2", type="file", example="pasport2.jpg"),
 *              @OA\Property(property="group_id", type="integer", example="1"),
 *  )
 *   }
 * )
 *   ),
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
 *                                                                @OA\Property(property="group_id", type="integer", example=1),
 *                                                                @OA\Property(property="group_name", type="string", example="Группа Б"),
 *       ),
 *
 *             @OA\Property(property="message", type="text", example="Пользователь не найден."),
 * )
 * ),
 *    ),
 *    ),
 *   )
 * )
 */
class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {

    $data = $request->validated();


    $data = $request->input();


    $user = User::find($data['id']);

    if ($user == null) {
          return response()->json(['message' => 'Пользователь не найден.']);
      }



      if ($user['avatar'] && is_file($user['avatar'])) {
          if($user['avatar'] != "")
          {
              Storage::disk('public')->delete($user['avatar']);
          }
          $data['avatar'] = Storage::disk('public')->put('/avatar', $data['avatar']);
      }

      if ($user['pasport1'] && is_file($user['pasport1'])) {
          if($user['pasport1'] != "")
          {
              Storage::disk('public')->delete($user['pasport1']);
          }
          $data['pasport1'] = Storage::disk('public')->put('/pasport1', $data['pasport1']);
      }

      if ($user['pasport2'] && is_file($user['pasport2'])) {
          if($user['pasport2'] != "")
          {
              Storage::disk('public')->delete($user['pasport2']);
          }
          $data['pasport2'] = Storage::disk('public')->put('/pasport2', $data['pasport2']);
      }

    $user->update($data);

    $usersAndGroups = User:://join('groups','groups.id','=','users.group_id')
        leftjoin('groups', function($join){
            $join->on('users.group_id','=','groups.id');
            //$join->orWhereNull('users.group_id');
        })
      ->select('users.*', 'groups.name as group_name')
      ->get()
        ->where('id', $user->id);

      if ($usersAndGroups->isEmpty())
      {
          return User::find($user);
      }

      return $usersAndGroups;
      //return UserResource::collection($usersAndGroups);

  }
}
