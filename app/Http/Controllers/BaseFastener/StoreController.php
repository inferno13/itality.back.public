<?php

namespace App\Http\Controllers\BaseFastener;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseFastener\StoreRequest;
use App\Models\BaseFastener;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreController extends Controller
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    if (isset($data['scheme']) && !is_file($data['scheme']) && !is_string($data['scheme'])) {
      return json_encode(['message' => 'В данное поле нужно загрузить файл или строчный тип данных.']);
    }

    if (isset($data['scheme']) && is_string($data['scheme']))
        {
            $copy = 'base-fastener/' . Str::random() . explode('/', $data['scheme'])[1];
            $file = 'public/'.$data['scheme'];
            $success = Storage::copy($file, 'public/'.$copy);
            if ($success) {
                $data['scheme'] = $copy;
            }
        }

    if (isset($data['scheme']) && is_file($data['scheme'])) {
        $data['scheme'] = Storage::disk('public')->put('base-fastener', $data['scheme']);
    }

    $item = BaseFastener::create($data);

    return $item;
  }

}
