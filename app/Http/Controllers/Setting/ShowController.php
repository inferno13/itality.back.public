<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Resource\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *   path="/api/setting/show",
 *   summary="Одиночный заказ",
 *   tags={"Order"},
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
 *      description="OK /При ошибке возвращается message",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Заказ не найден."),
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
 *
 *
 *
 *              @OA\Property(property="message", type="text", example="Заказ не найден."),
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
      /*$data = $request->input();

      $order = Order::where('id', $data['id'])->first(); // Используем first() вместо get()

      if ($order === null) {
          return response()->json(['message' => 'Заказ не найден.']);
      }

      return response()->json($order); // Возвращаем объект в формате {...data}*/
  }
}
