<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Resource\GroupResource;
use App\Models\Group;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Post(
 *   path="/api/group/store",
 *   summary="Создание группы",
 *   tags={"Group"},
 *   @OA\Parameter(
 *       description="Обязательный name, rules необязательгно.",
 *       in="path",
 *       name="group",
 *       required=true,
 *       example=""
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="name", type="string", example="Группа"),
 *              @OA\Property(property="rules", type="array", @OA\Items(
 *                                                               @OA\Property(property="controller", type="string", example="ListController"),
 *                                                               @OA\Property(property="active", type="string", example=true),
 *   ),
 *  ),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Поле группа обязательно для заполнения."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="name", type="string", example="Группа"),
 *                  @OA\Property(property="rules", type="array", @OA\Items(
 *                                                               @OA\Property(property="controller", type="string", example="ListController"),
 *                                                               @OA\Property(property="active", type="string", example=true),
 * ),
 * ),
 *    ),
 *    ),
 *    ),
 *   )
 * )
 */
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // data

        $data = $request->validated();


        $new_group['title'] = $data['title'];

        // save group
        $group = Group::create($new_group);


        if (isset($data['rules']) && in_array(gettype($data['rules']), array('array', 'object'))) {

            foreach ($data['rules'] as $module => $controllers) {
                foreach ($controllers as $controller => $active) {
                    if ($active === true) {
                        $rule['module'] = $module;
                        $rule['controller'] = $controller;
                        $rule['active'] = $active;
                        $rule['group_id'] = $group->id;

                        Rule::create([
                        'module' => $rule['module'],
                        'controller' => $rule['controller'],
                        'active' => $rule['active'],
                        'group_id' => $rule['group_id']
                        ]);
                    }
                }
            }
            // save rule


        $rules = Rule::where('group_id', $group->id)->get();

        foreach ($rules as $item) {
            $groupRules[trim($item->module)][trim($item->controller)] = $item->active;
        }
            $group['rule'] = $groupRules;
    }

        // end
        return $group;
    }

}
