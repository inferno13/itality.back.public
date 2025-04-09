<?php

namespace App\Http\Controllers\BaseDoorstep;

use App\Http\Controllers\Controller;
use App\Models\BaseDoorstep;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $item = BaseDoorstep::where('id', $data['id'])->first();

    if ($item === null) {
      return response()->json(['message' => 'Порог не найден.']);
    }

    return response()->json($item);
  }
}
