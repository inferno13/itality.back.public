<?php

namespace App\Http\Controllers\BaseCondition;

use App\Http\Controllers\Controller;
use App\Models\BaseCondition;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $item = BaseCondition::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Базовое условие не найдено.']);
      }
      $item->delete();

      return response()->json(['message' => 'Базовое условие успешно удалёно.']);
  }
}
