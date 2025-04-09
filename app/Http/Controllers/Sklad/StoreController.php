<?php

namespace App\Http\Controllers\Sklad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sklad\StoreRequest;
use App\Http\Resource\SkladResource;
use App\Models\Sklad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Post(
 *   path="/api/sklad/store",
 *   summary="Создание фурнитуры",
 *   tags={"Sklad"},
 *    description="При ошибке возвращается message.",
 *   @OA\Parameter(
 *       description="Обязательно только data_start_work, counterparty, cars, status остальные атрибуты нет.",
 *       in="path",
 *       name="sklad",
 *       required=true,
 *       example=1
 *   ),
 *
 *   @OA\RequestBody(
 *        @OA\JsonContent(
 *            allOf={
 *                @OA\Schema(
 *                    @OA\Property(property="date_start_work", type="dateTime", example="25-07-2024 10:17:01"),
 *                    @OA\Property(property="date_end_work", type="dateTime", example="25-07-2024 10:17:01"),
 *                    @OA\Property(property="counterparty", type="string", example="Dr."),
 *                    @OA\Property(property="cars", type="string", example="Prof. Jakayla Cummings Sr."),
 *                    @OA\Property(property="sum", type="integer", example="860480"),
 *                    @OA\Property(property="payed", type="integer", example="256389"),
 *                    @OA\Property(property="status", type="string", example="dolorem"),
 *                    @OA\Property(property="comments", type="text", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
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
 *              @OA\Property(property="date_start_work", type="dateTime", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="date_end_work", type="dateTime", example="25-07-2024 10:17:01"),
 *              @OA\Property(property="counterparty", type="string", example="Dr."),
 *              @OA\Property(property="cars", type="string", example="Prof. Jakayla Cummings Sr."),
 *              @OA\Property(property="sum", type="integer", example="860480"),
 *              @OA\Property(property="payed", type="integer", example="256389"),
 *              @OA\Property(property="status", type="string", example="dolorem"),
 *              @OA\Property(property="comments", type="text", example="Asperiores quasi ut placeat corporis provident ipsa quisquam. Inventore dolores ut quos aut. Eligendi debitis est voluptatem atque rerum voluptatum."),
 *     ),),
 *
 *
 *
 *              @OA\Property(property="message1", type="text", example="Фурнитура не найдена."),
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

    $id = Sklad::create($data)->id;

    $sklad = Sklad::find($id);

      return $sklad;
      //return SkladResource::collection($sklad);
  }

}
