<?php

namespace App\Http\Controllers\BaseFastener;

use App\Http\Controllers\Controller;
use App\Models\BaseFastener;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $item = BaseFastener::where('id', $data['id'])->first();

    if ($item === null) {
      return response()->json(['message' => 'Крепеж не найден.']);
    }

    return response()->json($item);
  }
}
