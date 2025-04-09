<?php

namespace App\Http\Controllers\BaseHandle;

use App\Http\Controllers\Controller;
use App\Models\BaseHandle;

class ListController extends Controller
{
  public function __invoke()
  {

    $item = BaseHandle::all();

    if ($item == null) {
      return response()->json(['message' => 'Ручки не найдены.']);
    }

    return $item;

  }
}
