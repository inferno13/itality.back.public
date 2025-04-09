<?php

namespace App\Http\Controllers\BaseDoorstep;

use App\Http\Controllers\Controller;
use App\Models\BaseDoorstep;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $item = BaseDoorstep::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Порог не найден.']);
      }
      $item->delete();

      return response()->json(['message' => 'Порог успешно удалён.']);
  }
}
