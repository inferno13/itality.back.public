<?php

namespace App\Http\Controllers\BaseMagnet;

use App\Http\Controllers\Controller;
use App\Models\BaseMagnet;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $item = BaseMagnet::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Магнит не найден.']);
      }
      $item->delete();

      return response()->json(['message' => 'Магнит успешно удалён.']);
  }
}
