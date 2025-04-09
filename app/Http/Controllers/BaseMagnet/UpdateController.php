<?php

namespace App\Http\Controllers\BaseMagnet;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseMagnet\UpdateRequest;
use App\Models\BaseMagnet;

class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
      $data = $request->validated();

      $item = BaseMagnet::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Магнит не найден.']);
      }

      $item->update($data);

      return $item;
  }
}
