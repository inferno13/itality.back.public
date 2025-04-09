<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Http\Resource\BaseResource;
use App\Models\Base;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/base/show",
 *   summary="Одиночная позция",
 *   tags={"Base"},
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="id", type="integer", example="1"),
 * )
 *   }
 * )
 *   ),
 *
 *   @OA\Response(
 *      response=200,
 *      description="OK /При ошибке возвращается message. Путь к Изображениям storage/app/public/base/(сюда то-что из бека пришло)",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Позиция не найдена."),
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
 *   )),
 *   ),
 *    ),
 *    ),
 *   )
 * )
 */
class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $base = Base::where('id', $data['id'])->first();

    if ($base === null) {
      return response()->json(['message' => 'Позиция не найдена.']);
    }

     return response()->json($base);
    //return BaseResource::collection($base);
  }
}
