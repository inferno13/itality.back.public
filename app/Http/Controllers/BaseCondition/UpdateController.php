<?php

namespace App\Http\Controllers\BaseCondition;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseCondition\UpdateRequest;
use App\Models\BaseCondition;


class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
      $data = $request->validated();

      $item = BaseCondition::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Базовое условие не найдено.']);
      }

      $item->update($data);

      return $item;
  }
}
