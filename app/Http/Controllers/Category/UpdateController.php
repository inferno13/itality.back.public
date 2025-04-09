<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resource\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @OA\Post(
 *   path="/api/category/update",
 *   summary="Изменение категории",
 *   tags={"Category"},
 *
 *
 *   @OA\Parameter(
 *       description="Обязательно только id остальные атрибуты нет. Можно изменять сразу все или один или несколько.",
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
 *          @OA\Property(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=900),
 *              @OA\Property(property="parent_id", type="integer", example=20),
 *              @OA\Property(property="tab_id", type="integer", example=10),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="string", example="image.png"),
 * ),
 *     )
 *   },
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="pos", type="integer", example=900),
 *              @OA\Property(property="parent_id", type="integer", example=20),
 *              @OA\Property(property="tab_id", type="integer", example=10),
 *              @OA\Property(property="title", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="image", type="string", example="image.png"),
 *       ),),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Категория не найдена."),
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

      $category = Category::find($data['id']);
      if ($category == null) {
          return response()->json(['message' => 'Категория не найдена.']);
      }

      if (empty($data['image']) && $category['image'] != "") {
        Storage::disk('public')->delete($category['image']);
        $data['image'] = null;
      }

      if (isset($data['image']) && is_string($data['image'])) {
        if($category['image'] != "")
        {
            Storage::disk('public')->delete($category['image']);
        }
        $copy = 'category/' . Str::random() . explode('/', $data['image'])[1];
        $file = 'public/'.$data['image'];
        $success = Storage::copy($file, 'public/'.$copy);
        if ($success) {
            $data['image'] = $copy;
        }
    }

      if (isset($data['image']) && is_file($data['image'])) {
          if($category['image'] != "")
          {
              Storage::disk('public')->delete($category['image']);
          }
          $data['image'] = Storage::disk('public')->put('category', $data['image']);
      }

    $category->update($data);

    return $category;
    //return CategoryResource::collection($category);
  }
}
