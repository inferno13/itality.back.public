<?php

namespace App\Http\Controllers\BaseCondition;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseCondition\StoreRequest;
use App\Models\BaseCondition;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $item = BaseCondition::create($data);

    return $item;
  }

}
