<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/order/delete",
 *   summary="Удаление Заказа",
 *   tags={"Order"},
 *   description="При ошибке возвращается message",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Заказ успешно удалена или Заказ не найдена."),
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $order = Order::find($data['id']);
      if ($order == null) {
          return response()->json(['message' => 'Заказ не найден.']);
      }
      $order->delete($data);

      return response()->json(['message' => 'Заказ успешно удалён.']);
  }
}
