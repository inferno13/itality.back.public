<?php

namespace App\Http\Controllers\BaseCondition;

use App\Http\Controllers\Controller;
use App\Models\BaseCondition;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $item = BaseCondition::where('id', $data['id'])->first();

    if ($item === null) {
      return response()->json(['message' => 'Базовое условие не найдено.']);
    }

    return response()->json($item);
  }
}
