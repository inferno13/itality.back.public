<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use App\Models\Rule;


/**
 * @OA\Post(
 *   path="/api/group/update",
 *   summary="Изменение группы",
 *   tags={"Group"},
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="group",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="name", type="string", example="Группа"),
 *                  @OA\Property(property="rules", type="array", @OA\Items(
 *                                                               @OA\Property(property="module", type="string", example="Order"),
 *                                                               @OA\Property(property="controller", type="string", example="ListController"),
 *                                                               @OA\Property(property="active", type="string", example=true),
 *   ),
 *  )
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="Created /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="name", type="string", example="Группа"),
 *                 @OA\Property(property="rules", type="array", @OA\Items(
 *                                                               @OA\Property(property="module", type="string", example="Order"),
 *                                                               @OA\Property(property="controller", type="string", example="ListController"),
 *                                                               @OA\Property(property="active", type="string", example=true),
 *
 *
 *
 *                                                               @OA\Property(property="message", type="text", example="Группа не найдена."),
 * )
 * ),
 *       ),
 *    ),
 *    ),
 *   )
 * )
 */
class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
    $data = $request->input();

    $group = Group::find($data['id']);

    if ($group == null) {
    return response()->json(['message' => 'Группа не найдена.']);
    }

    $group->update(['title' => $data['title']]);


    if (isset($data['rules'])) {

        Rule::where('group_id', $data['id'])->delete();

        $new_rules = $data['rules'];

        foreach ($new_rules as $module => $controllers) {
            foreach ($controllers as $controller => $active) {
                $rule['group_id'] = $group->id;
                $rule['module'] = $module;
                $rule['controller'] = $controller;
                $rule['active'] = $active;

                Rule::create($rule);
            }
        }


      $rules = Rule::where('group_id', $group->id)->get();

      foreach ($rules as $item) {
          $groupRules[trim($item->module)][trim($item->controller)] = $item->active;
      }

      $group['rule'] = $groupRules;
  }
    return $group;

  }
}
