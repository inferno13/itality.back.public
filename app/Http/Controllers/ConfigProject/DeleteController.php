<?php

namespace App\Http\Controllers\ConfigProject;

use App\Http\Controllers\Controller;
use App\Models\ConfigProject;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/config_project/delete",
 *   summary="Удаление Конфигурационного Проекта",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Конфигурационый Проект не найден или Конфигурационый Проект успешно удалён ."),
 *
 *
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $config_project = ConfigProject::find($data['id']);
      if ($config_project == null) {
          return response()->json(['message' => 'Конфигурационый Проект не найден.']);
      }

      if ($config_project['scheme'] != "") {
          Storage::disk('public')->delete($config_project['scheme']);
      }

      if ($config_project['walkin'] != "") {
          Storage::disk('public')->delete($config_project['walkin']);
      }

      if ($config_project['inside'] != "") {
          Storage::disk('public')->delete($config_project['inside']);
      }

      if ($config_project['outside'] != "") {
          Storage::disk('public')->delete($config_project['outside']);
      }

      if ($config_project['outin'] != "") {
          Storage::disk('public')->delete($config_project['outin']);
      }

      if ($config_project['sliding'] != "") {
          Storage::disk('public')->delete($config_project['sliding']);
      }

      $config_project->delete($data);

      return response()->json(['message' => 'Конфигурационый Проект успешно удален.']);
  }
}
