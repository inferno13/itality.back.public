<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;


/**
 * @OA\Get (
 *   path="/api/setting/list",
 *   summary="Список всех Настроек",
 *   tags={"Setting"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="title", type="string", example="Ссылка на яндекс карты"),
 *              @OA\Property(property="type", type="string", example="text"),
 *              @OA\Property(property="value", type="boolean", example="860480"),
 *
 *
 *              @OA\Property(property="message", type="text", example="Настройки не найдены."),
 *
 * ),
 *        ),
 *    ),
 * )
 * )
 */
class ListController extends Controller
{
  public function __invoke()
  {

      $setting = Setting::all();

      if ($setting == null) {
          return response()->json(['message' => 'Настройки не найдены.']);
      }

      return $setting;
      //return SettingResource::collection($setting);
  }
}
