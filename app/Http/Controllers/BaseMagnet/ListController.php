<?php

namespace App\Http\Controllers\BaseMagnet;

use App\Http\Controllers\Controller;
use App\Models\BaseMagnet;
use Illuminate\Http\Request;


class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');

    $item = BaseMagnet::all()->where('base_id', $id)->values()->toArray();

      if ($item == null) {
          return response()->json(['message' => 'Магниты не найдены.']);
      }
      return response()->json($item);
  }
}
