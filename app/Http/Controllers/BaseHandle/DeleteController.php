<?php

namespace App\Http\Controllers\BaseHandle;

use App\Http\Controllers\Controller;

use App\Models\BaseHandle;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
  public function __invoke(Request $request)
  {
      $data = $request->input();
      $base_handle = BaseHandle::find($data['id']);
      if ($base_handle == null) {
          return response()->json(['message' => 'Ручка не найдена.']);
      }
      $base_handle->delete();

      return response()->json(['message' => 'Ручка успешно удалёна.']);
  }
}
