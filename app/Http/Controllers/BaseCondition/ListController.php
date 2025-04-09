<?php

namespace App\Http\Controllers\BaseCondition;

use App\Http\Controllers\Controller;
use App\Models\BaseCondition;
use Illuminate\Http\Request;


class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');

    $item = BaseCondition::all()->where('base_id', $id)->sortBy('id')->values()->toArray();

      if ($item == null) {
          return response()->json(['message' => 'Базовое условия не найдены.']);
      }

      return response()->json($item);
  }
}
