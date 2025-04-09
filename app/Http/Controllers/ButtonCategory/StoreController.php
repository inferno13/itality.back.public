<?php

namespace App\Http\Controllers\ButtonCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\ButtonCategory\StoreRequest;
use App\Models\ButtonCategory;
use Illuminate\Support\Facades\Storage;


/**
 * @OA\Post(
 *   path="/api/button_category/store",
 *   summary="Создание Категории Кнопок",
 *   tags={"ButtonCategory"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="",
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
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="color", type="string", example="red"),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="Created /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Это поле обязательно для заполнения."),
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=860480),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="color", type="string", example="red"),
 * ),),
 *
 *
 *
 *          )),
 *      ),
 *    ),
 *    ),
 *   )
 * )
 */
class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
        $data = $request->validated();

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = Storage::disk('public')->put('button_category', $data['image']);
        }

        $button_category = ButtonCategory::create($data);

        return $button_category;
  }

}
