<?php

namespace App\Http\Controllers\BaseDoorstep;

use App\Http\Controllers\Controller;
use App\Models\BaseDoorstep;
use Illuminate\Http\Request;


class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');

    $item = BaseDoorstep::all()->where('base_id', $id)->values()->toArray();

      if ($item == null) {
          return response()->json(['message' => 'Пороги не найдены.']);
      }

      return response()->json($item);
  }
}
