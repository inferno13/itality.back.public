<?php

namespace App\Http\Controllers\ButtonCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ButtonCategory\UpdateRequest;
use App\Models\ButtonCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @OA\Post(
 *   path="/api/button_category/update",
 *   summary="Изменение Категория Кнопок",
 *   tags={"ButtonCategory"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
 *       in="path",
 *       name="button_category",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="color", type="string", example="red"),
 *   )
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
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="color", type="string", example="red"),
 *
 *              @OA\Property(property="message", type="text", example="Категория Кнопок не найдена."),
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

        $button_category = ButtonCategory::find($data['id']);
        if ($button_category == null) {
            return response()->json(['message' => 'Категория Кнопок не найдена.']);
        }

        if (empty($data['image']) && $button_category['image'] != "") {
            Storage::disk('public')->delete($button_category['image']);
            $data['image'] = null;
          }

        if (isset($data['image']) && is_string($data['image'])) {
            if($button_category['image'] != "")
            {
                Storage::disk('public')->delete($button_category['image']);
            }
            $copy = 'button_category/' . Str::random() . explode('/', $data['image'])[1];
            $file = 'public/'.$data['image'];
            $success = Storage::copy($file, 'public/'.$copy);
            if ($success) {
                $data['image'] = $copy;
            }
        }

        if (isset($data['image']) && is_file($data['image'])) {
            if($button_category['image'] != "")
            {
                Storage::disk('public')->delete($button_category['image']);
            }
            $data['image'] = Storage::disk('public')->put('button_category', $data['image']);
        }

        $button_category->update($data);

        return $button_category;
    }
}
