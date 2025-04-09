<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;


class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');

    $item = Condition::all();

      if ($item == null) {
          return response()->json(['message' => 'Условия не найдены.']);
      }

      return response()->json($item);
  }
}
