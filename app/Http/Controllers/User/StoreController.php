<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resource\UserResource;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/user/store",
 *   summary="Создание пользователя",
 *   tags={"User"},
 *   @OA\Parameter(
 *       description=".",
 *       in="path",
 *       name="Bearer Token",
 *       required=true,
 *       example=""
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="avatar", type="string", example="avatar/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="name", type="string", example="Chris"),
 *              @OA\Property(property="surname", type="string", example="Paul"),
 *              @OA\Property(property="pathname", type="string", example="Jones"),
 *              @OA\Property(property="gender", type="string", example="female/male"),
 *              @OA\Property(property="birthdate", type="date", example="01.01.2000"),
 *              @OA\Property(property="email", type="email", example="chris@gmail.com"),
 *              @OA\Property(property="phone", type="string", example="4356436346"),
 *              @OA\Property(property="mobile", type="string", example="4356436346"),
 *              @OA\Property(property="pasport1", type="string", example="pasport1/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="pasport2", type="string", example="pasport2/sdfs32543kmfsd.jpg"),

 *              @OA\Property(property="group_id", type="integer", example=1),
 *  )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="Created /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле обязательно для заполнения."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="avatar", type="string", example="avatar/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="name", type="string", example="Chris"),
 *              @OA\Property(property="surname", type="string", example="Paul"),
 *              @OA\Property(property="pathname", type="string", example="Jones"),
 *              @OA\Property(property="gender", type="string", example="female/male"),
 *              @OA\Property(property="birthdate", type="date", example="01.01.2000"),
 *              @OA\Property(property="email", type="email", example="chris@gmail.com"),
 *              @OA\Property(property="phone", type="string", example="4356436346"),
 *              @OA\Property(property="mobile", type="string", example="4356436346"),
 *              @OA\Property(property="pasport1", type="string", example="pasport1/sdfs32543kmfsd.jpg"),
 *              @OA\Property(property="pasport2", type="string", example="pasport2/sdfs32543kmfsd.jpg"),

 *              @OA\Property(property="group", type="array", @OA\Items(
 *                                                                @OA\Property(property="group_id", type="integer", example="1"),
 *                                                                @OA\Property(property="group_name", type="string", example="Группа Б"),
 *    ),
 *
 *
 *
 *              @OA\Property(property="message1", type="text", example="Пользователь не найден."),
 * )
 * ),
 *    ),
 *    ),
 *   )
 * )
 */
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $group = Group::find($data['group_id']);

        if (!$group){
              return response()->json(['message' => 'Такой Группы пользователей нет!']);
          }

        if ($data['avatar'] && is_file($data['avatar'])) {
            $data['avatar'] = Storage::disk('public')->put('/avatar', $data['avatar']);
        }

        if ($data['pasport1'] && is_file($data['pasport1'])) {
            $data['pasport1'] = Storage::disk('public')->put('/pasport1', $data['pasport1']);
        }

        if ($data['pasport2'] && is_file($data['pasport2'])) {
            $data['pasport2'] = Storage::disk('public')->put('/pasport2', $data['pasport2']);
        }

        $id = User::firstOrCreate(
          [
            'phone' => $data['phone'],
            'email' => $data['email']
          ],
          $data)->id;

        if (!$id){
            return response()->json(['message' => 'Почта или телефон уникальны и уже есть в базе!']);
        }

        $user = User:://join('groups','groups.id','=','users.group_id')
            leftjoin('groups', function($join){
                $join->on('users.group_id','=','groups.id');
                //$join->orWhereNull('users.group_id');
            })
            ->select('users.*', 'groups.name as group_name')
            ->where('users.id', $id)
            ->first();

        return json_encode($user);
        //return UserResource::collection($user);
    }
}
