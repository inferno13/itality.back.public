<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Rule;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *   path="/api/supplier/delete",
 *   summary="Удаление Поставщика",
 *   tags={"Supplier"},
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
 *          @OA\Property(property="message", type="string", example="Поставщик не найдена или Поставщик успешно удалёна."),
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
      $data = $request->input();
      $supplier = Supplier::find($data['id']);
      if ($supplier == null) {
          return response()->json(['message' => 'Поставщик не найдена.']);
      }
      $supplier->delete($data);

      return response()->json(['message' => 'Поставщик успешно удалёна.']);
  }
}
