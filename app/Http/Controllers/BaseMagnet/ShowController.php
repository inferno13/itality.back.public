<?php

namespace App\Http\Controllers\BaseMagnet;

use App\Http\Controllers\Controller;
use App\Models\BaseMagnet;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $item = BaseMagnet::where('id', $data['id'])->first();

    if ($item === null) {
      return response()->json(['message' => 'Магнит не найден.']);
    }

    return response()->json($item);
  }
}
