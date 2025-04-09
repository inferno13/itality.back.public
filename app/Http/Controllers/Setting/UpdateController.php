<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UpdateRequest;
use App\Models\Setting;


/**
 * @OA\Post(
 *   path="/api/setting/update",
 *   summary="Изменение позиции",
 *   tags={"Setting"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="setting",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="title", type="string", example="Ссылка на яндекс карты"),
 *              @OA\Property(property="type", type="string", example="text"),
 *              @OA\Property(property="value", type="boolean", example="860480"),
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
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="title", type="string", example="Ссылка на яндекс карты"),
 *              @OA\Property(property="type", type="string", example="text"),
 *              @OA\Property(property="value", type="boolean", example="860480"), *
 *
 *
 *              @OA\Property(property="message", type="text", example="Позиция не найдена."),
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

        $setting = Setting::find($data['id']);
        if ($setting == null) {
            return response()->json(['message' => 'Позиция не найдена.']);
        }
        $setting->update($data);


        return $setting;
    }
}
