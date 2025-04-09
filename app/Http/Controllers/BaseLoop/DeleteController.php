<?php

namespace App\Http\Controllers\BaseLoop;

use App\Http\Controllers\Controller;

use App\Models\BaseLoop;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $base_loop = BaseLoop::find($data['id']);
      if ($base_loop == null) {
          return response()->json(['message' => 'Петля не найдена.']);
      }
      $base_loop->delete();

      return response()->json(['message' => 'Петля успешно удалёна.']);
  }
}
