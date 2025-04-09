<?php

namespace App\Http\Controllers\BaseLoop;

use App\Http\Controllers\Controller;
use App\Models\BaseLoop;
use Illuminate\Http\Request;


class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');

    $base_loop = BaseLoop::all()->where('base_id', $id)->values()->toArray();

      if ($base_loop == null) {
          return response()->json(['message' => 'Петли не найдены.']);
      }

      return response()->json($base_loop);
  }
}
