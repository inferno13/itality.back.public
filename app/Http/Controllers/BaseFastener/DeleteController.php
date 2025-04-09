<?php

namespace App\Http\Controllers\BaseFastener;

use App\Http\Controllers\Controller;
use App\Models\BaseFastener;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $item = BaseFastener::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Крепеж не найден.']);
      }
      $item->delete();

      return response()->json(['message' => 'Крепеж успешно удалён.']);
  }
}
