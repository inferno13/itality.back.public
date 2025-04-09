<?php

namespace App\Http\Controllers\ConfigProject;

use App\Http\Controllers\Controller;
use App\Models\ConfigProject;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/config_project/show",
 *   summary="Одиночная Конфигурационый Проект",
 *   tags={"ConfigProject"},
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
 *          @OA\Property(property="message", type="string", example="Конфигурационый Проект не найдена."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="string", example="1"),
 *              @OA\Property(property="coord_x", type="integer", example=565),
 *              @OA\Property(property="coord_y", type="integer", example=565),
 *              @OA\Property(property="turn", type="integer", example=565),
 *              @OA\Property(property="scheme", type="string", example="config/project/DFG9345LKJN5456.jpg"),
 *              @OA\Property(property="walkin", type="string", example="config/project/DFG9345LKJN5456.jpg"),
 *              @OA\Property(property="select_1", type="string", example="string"),
 *              @OA\Property(property="value_1", type="integer", example=565),
 *              @OA\Property(property="select_2", type="string", example="string"),
 *              @OA\Property(property="select_3", type="string", example="string"),
 *              @OA\Property(property="value_2", type="integer", example=565),
 *              @OA\Property(property="select_4", type="string", example="string"),
 *              @OA\Property(property="select_5", type="string", example="string"),
 *              @OA\Property(property="select_6", type="string", example="string"),
 *              @OA\Property(property="select_7", type="string", example="string"),
 *              @OA\Property(property="select_8", type="string", example="string"),
 *              @OA\Property(property="select_9", type="string", example="string"),
 *              @OA\Property(property="select_10", type="string", example="string"),
 *              @OA\Property(property="select_11", type="string", example="string"),
 *              @OA\Property(property="value_3", type="integer", example=565),
 *              @OA\Property(property="select_12", type="string", example="string"),
 *              @OA\Property(property="select_13", type="string", example="string"),
 *              @OA\Property(property="select_14", type="string", example="string"),
 *
 *
 *              @OA\Property(property="message", type="text", example="Конфигурационый Проект не найдена."),
 *   )),
 *   ),
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

    $config_project = null;
    if (isset($data['id'])) {
        $config_project = ConfigProject::find($data['id']);
    } elseif (isset($data['config_id'])) {
        $config_project = ConfigProject::where('config_id', $data['config_id'])->first();
    }

    if ($config_project === null) {
        return response()->json(['message' => 'Конфигурационый Проект не найдена.']);
    }

    return response()->json($config_project);
  }
}
