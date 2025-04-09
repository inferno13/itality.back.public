<?php

namespace App\Http\Controllers\BaseLoop;

use App\Http\Controllers\Controller;
use App\Models\BaseLoop;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $base_loop = BaseLoop::where('id', $data['id'])->first();

    if ($base_loop === null) {
      return response()->json(['message' => 'Петля не найдена.']);
    }

    return response()->json($base_loop);
  }
}
