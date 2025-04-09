<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Requests\Base\StoreRequest;
use App\Http\Resource\BaseResource;
use App\Models\Base;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Post(
 *   path="/api/base/store",
 *   summary="Создание заказа",
 *   tags={"Base"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="Обязательно только data_start_work, counterparty, cars, status остальные атрибуты нет.",
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
 *              @OA\Property(property="structure", type="string", example="dolorem"),
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
 *              @OA\Property(property="active", type="boolean", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="pos", type="integer", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="group", type="string", example="Dr."),
 *              @OA\Property(property="name", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="cash", type="integer", example="860480"),
 *              @OA\Property(property="extra", type="boolean", example="256389"),
 *              @OA\Property(property="image", type="file", example="image.png"),
 *              @OA\Property(property="property", type="string", example="dolorem"),
 *              @OA\Property(property="structure", type="string", example="dolorem"),
 *     ),),
 *
 *
 *
 *              @OA\Property(property="message1", type="text", example="Заказ не найден."),
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
        $data['image'] = Storage::disk('public')->put('base', $data['image']);
    }

    $base = Base::create($data);

      return $base;
      //return BaseResource::collection($base);
  }

}
