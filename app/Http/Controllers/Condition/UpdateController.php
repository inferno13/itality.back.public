<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condition\UpdateRequest;
use App\Models\Condition;


class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
      $data = $request->validated();

      $item = Condition::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Условие не найдено.']);
      }

      $item->update($data);

      return $item;
  }
}
