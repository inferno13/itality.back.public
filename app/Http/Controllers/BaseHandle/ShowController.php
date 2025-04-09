<?php

namespace App\Http\Controllers\BaseHandle;

use App\Http\Controllers\Controller;
use App\Models\BaseHandle;
use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function __invoke(Request $request)
  {
    $data = $request->input();

    $base_id = $data['base'];
    
    if ($base_id != null) {
      $item = BaseHandle::where('base_id', $base_id)->first();

      if ($item === null) {
        return response()->json(['message' => 'Петля не найдена.']);
      } else {
        return response()->json($item);
      }
    }

    $item = BaseHandle::where('id', $data['id'])->first();

    if ($item === null) {
      return response()->json(['message' => 'Петля не найдена.']);
    }

    return response()->json($item);
  }
}
