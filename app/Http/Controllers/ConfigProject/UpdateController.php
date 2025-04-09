<?php

namespace App\Http\Controllers\ConfigProject;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigProject\UpdateRequest;
use App\Models\ConfigProject;
use Illuminate\Support\Facades\Storage;


/**
 * @OA\Post(
 *   path="/api/config_project/update",
 *   summary="Изменение Конфигурационной Сборки",
 *   tags={"ConfigProject"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="config_project",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
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
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле для даты."),
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
 *
 *              @OA\Property(property="message", type="text", example="Конфигурационная Сборка не найдена."),
 *      )),
 *   ),
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

        $config_project = ConfigProject::find($data['id']);
        if ($config_project == null) {
            return response()->json(['message' => 'Конфигурационная Сборка не найдена.']);
        }

        if (isset($data['scheme']) && is_file($data['scheme'])) {
            if($config_project['scheme'] != "")
            {
                Storage::disk('public')->delete($config_project['scheme']);
            }
            $data['scheme'] = Storage::disk('public')->put('config/project', $data['scheme']);

        }
        if (isset($data['walkin']) && is_file($data['walkin'])) {
            if($config_project['walkin'] != "")
            {
                Storage::disk('public')->delete($config_project['walkin']);
            }
            $data['walkin'] = Storage::disk('public')->put('config/project', $data['walkin']);
        }

        if (isset($data['inside']) && is_file($data['inside'])) {
          if($config_project['inside'] != "")
          {
              Storage::disk('public')->delete($config_project['inside']);
          }
          $data['inside'] = Storage::disk('public')->put('config/project', $data['inside']);
        }

        if (isset($data['outside']) && is_file($data['outside'])) {
          if($config_project['outside'] != "")
          {
              Storage::disk('public')->delete($config_project['outside']);
          }
          $data['outside'] = Storage::disk('public')->put('config/project', $data['outside']);
        }

        if (isset($data['outin']) && is_file($data['outin'])) {
          if($config_project['outin'] != "")
          {
              Storage::disk('public')->delete($config_project['outin']);
          }
          $data['outin'] = Storage::disk('public')->put('config/project', $data['outin']);
        }

        if (isset($data['sliding']) && is_file($data['sliding'])) {
          if($config_project['sliding'] != "")
          {
              Storage::disk('public')->delete($config_project['sliding']);
          }
          $data['sliding'] = Storage::disk('public')->put('config/project', $data['sliding']);
        }


        $config_project->update($data);

        return $config_project;
    }
}
