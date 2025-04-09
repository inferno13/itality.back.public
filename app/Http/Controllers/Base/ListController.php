<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Resource\BaseResource;
use App\Models\Base;


/**
 * @OA\Get (
 *   path="/api/base/list",
 *   summary="Список всех позиций",
 *   tags={"Base"},
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message. Путь к Изображениям storage/app/public/base/(сюда то-что из бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="array", @OA\Items(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="active", type="boolean", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="pos", type="integer", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="group", type="string", example="Dr."),
 *              @OA\Property(property="name", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="cash", type="integer", example="860480"),
 *              @OA\Property(property="extra", type="boolean", example="256389"),
 *              @OA\Property(property="image", type="string", example="dolorem"),
 *              @OA\Property(property="full_video", type="string", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *              @OA\Property(property="full_image", type="string", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *              @OA\Property(property="full_text", type="string", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *              @OA\Property(property="type", type="string", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *              @OA\Property(property="tab_id", type="integer", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Позиция не найдена."),
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

      $base = Base::all();

      if ($base == null) {
          return response()->json(['message' => 'Позиция не найдена.']);
      }

      return $base;
      //return BaseResource::collection($base);
  }
}
