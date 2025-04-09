<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resource\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/category/store",
 *   summary="Создание категории",
 *   tags={"Category"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="Обязательно только data_start_work, counterparty, cars, status остальные атрибуты нет.",
 *       in="path",
 *       name="category",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *              @OA\Property(property="pos", type="integer", example=900),
 *              @OA\Property(property="parent_id", type="integer", example=20),
 *              @OA\Property(property="tab_id", type="integer", example=10),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="string", example="image.png"),
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
 *              @OA\Property(property="pos", type="integer", example=900),
 *              @OA\Property(property="parent_id", type="integer", example=20),
 *              @OA\Property(property="tab_id", type="integer", example=10),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="string", example="image.png"),
 *          ),),
 *
 *
 *
 *              @OA\Property(property="message1", type="text", example="Категория не найдена."),
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
        $data['image'] = Storage::disk('public')->put('category', $data['image']);
    }

    $category = Category::create($data);


    return $category;
    //return CategoryResource::collection($category);
  }

}
