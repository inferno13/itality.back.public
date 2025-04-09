<?php

namespace App\Http\Controllers\BaseMagnet;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseMagnet\StoreRequest;
use App\Models\BaseMagnet;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $item = BaseMagnet::create($data);

    return $item;
  }

}
