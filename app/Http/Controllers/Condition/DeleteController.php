<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $item = Condition::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Условие не найдено.']);
      }
      $item->delete();

      return response()->json(['message' => 'Условие успешно удалёно.']);
  }
}
