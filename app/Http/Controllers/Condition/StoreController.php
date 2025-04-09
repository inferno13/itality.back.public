<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use App\Http\Requests\Condition\StoreRequest;
use App\Models\Condition;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $item = Condition::create($data);

    return $item;
  }

}
