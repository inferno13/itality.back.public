<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Resource\GroupResource;
use App\Models\Group;


/**
 * @OA\Get (
 *   path="/api/group/list",
 *   summary="Список всех групп",
 *   tags={"Group"},
 *   description="Здесь можно увидеть и забрать все Модули и контроллеры.",
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="name", type="string", example="Группа"),
 *   ),
 *        ),
 *    ),
 *   ),
 *          @OA\Property(property="message", type="text", example="Группы не найдены."),
 *    ),
 *   ),
 * )
 * ))
 * ))
 */
class ListController extends Controller
{
  public function __invoke()
  {
      $groups = Group::all();
      if ($groups == null) {
          return response()->json(['message' => 'Группы не найдены.']);
      }
      return $groups;
  }
}
