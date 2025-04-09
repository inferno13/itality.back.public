<?php

namespace App\Http\Controllers\BaseHandle;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseHandle\UpdateRequest;
use App\Models\BaseHandle;


class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
      $data = $request->validated();

      $item = BaseHandle::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Ручки не найдена.']);
      }

      $item->update($data);

      return $item;
  }
}
