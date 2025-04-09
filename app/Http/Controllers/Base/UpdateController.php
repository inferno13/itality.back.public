<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\Base\UpdateRequest;
use App\Http\Resource\BaseResource;
use App\Models\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @OA\Post(
 *   path="/api/base/update",
 *   summary="Изменение позиции",
 *   tags={"Base"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="base",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="active", type="boolean", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="pos", type="integer", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="group", type="string", example="Dr."),
 *              @OA\Property(property="name", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="cash", type="integer", example="860480"),
 *              @OA\Property(property="extra", type="boolean", example="256389"),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="property", type="string", example="dolorem"),
 *              @OA\Property(property="structure", type="string", example="dolorem"), * )
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
 *              @OA\Property(property="active", type="boolean", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="pos", type="integer", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="group", type="string", example="Dr."),
 *              @OA\Property(property="name", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="cash", type="integer", example="860480"),
 *              @OA\Property(property="extra", type="boolean", example="256389"),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="property", type="string", example="dolorem"),
 *              @OA\Property(property="structure", type="string", example="dolorem"), *
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

        $base = Base::find($data['id']);
        if ($base == null) {
            return response()->json(['message' => 'Позиция не найдена.']);
        }

        if (empty($data['image']) && $base['image'] != "") {
            Storage::disk('public')->delete($base['image']);
            $data['image'] = null;
          }

        if (isset($data['image']) && is_file($data['image'])) {
            if($base['image'] != "")
            {
                Storage::disk('public')->delete($base['image']);
            }
            $data['image'] = Storage::disk('public')->put('base', $data['image']);
        }

        $base->update($data);

        return $base;
        //return BaseResource::collection($base);
    }
}
