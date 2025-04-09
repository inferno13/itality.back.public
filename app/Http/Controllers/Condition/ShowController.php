<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $item = Condition::where('id', $data['id'])->first();

    if ($item === null) {
      return response()->json(['message' => 'Условие не найдено.']);
    }

    return response()->json($item);
  }
}
