<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/setting/delete",
 *   summary="Удаление заказа",
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
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="message", type="string", example="Заказ не найден или Заказ успешно удалён"),
 *
 *
 *        ),
 *    ),
 * )
 */
class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      /*$data = $request->input();
      $order = Order::find($data['id']);
      if ($order == null) {
          return response()->json(['message' => 'Заказ не найден.']);
      }
      $order->delete($data);

      return response()->json(['message' => 'Заказ успешно удалён.']);*/
  }
}
