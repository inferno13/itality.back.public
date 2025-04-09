<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/group/show",
 *   summary="Одиночная группа",
 *   tags={"Group"},
 *   description="Если Контроллер есть под ключом rules_controller то его не будет в нижнем массиве. Соответсвенно если он есть под ключом rules_controller значит этой группе разрешён доступ к данной области!!!",
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 * )
 *   }
 * )
 *
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK  /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Группа не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="name", type="string", example="Группа"),
 *              @OA\Property(property="rules", type="array", @OA\Items(
 *                                                               @OA\Property(property="rules_id", type="integer", example="12"),
 *                                                               @OA\Property(property="rules_module", type="char", example="User"),
 *                                                               @OA\Property(property="rules_controller", type="char", example="ListController"),
 *                                                               @OA\Property(property="rules_active", type="boolean", example=true),
 *   ),
 *       ),
 *    ),),
 *    ),
 *   ),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *                                                          @OA\Property(property="data", type="array", @OA\Items(
 *                                                              @OA\Property(property="Group", type="array", @OA\Items(
 *                                                                  @OA\Property(property="0", type="string", example="DeleteController,ListControllerShowController,StoreController,UpdateController"),
 *   ),
 *                                                              @OA\Property(property="Order", type="array", @OA\Items(
 *                                                                  @OA\Property(property="0", type="string", example="DeleteController,ListControllerShowController,StoreController,UpdateController"),
 *   ),
 *                                                              @OA\Property(property="User", type="array", @OA\Items(
 *                                                                  @OA\Property(property="0", type="string", example="ListController,ShowController,StoreController,UpdateController"),
 *   ),
 *   ),
 *          @OA\Property(property="message", type="text", example="Группа не найдена."),
 * ),
 *    )
 *   ))
 *   ))
 *   )
 * )
 */
class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $group = Group::find($data['id']);

   if ($group == null) {
    return response()->json(['message' => 'Группа не найдена.']);
    }

    $result = [];
    $dir = __DIR__;
    $dir = str_replace("Group", "", $dir);

    foreach (scandir($dir) as $folder) {

      if (!str_contains($folder, ".")) {

        foreach (scandir($dir . $folder) as $file) {

          if ($file != '.' and $file != '..' and $file != 'RulesController.php') {

            // $folder = $folder;
            $controller = str_replace('.php', '', $file);

            $rule = Rule::where('group_id', $data['id'])
              ->where('module', $folder)
              ->where('controller', $controller)
              ->get('active')
              ->first();

            if(isset($rule['active']) && $rule['active'] == true)
            {
              $mas[$folder][$controller] = true;
            }
            else
            {
              $mas[$folder][$controller] = false;
            }
          }
        }
      }
    }

    $group->rules = $mas;

    return $group;
  }

}
