<?php

namespace App\Http\Controllers\BaseFastener;

use App\Http\Controllers\Controller;
use App\Models\BaseFastener;
use Illuminate\Http\Request;


class ListController extends Controller
{
  public function __invoke(Request $request)
  {
    $id = $request->input('id');

    $item = BaseFastener::all()->where('base_id', $id)->values()->toArray();

      if ($item == null) {
          return response()->json(['message' => 'Крепежи не найдены.']);
      }

      return response()->json($item);
  }
}
