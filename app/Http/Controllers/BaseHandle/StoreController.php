<?php

namespace App\Http\Controllers\BaseHandle;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseHandle\StoreRequest;
use App\Models\BaseHandle;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $item = BaseHandle::create($data);

    return $item;
  }

}
