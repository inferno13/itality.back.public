<?php

namespace App\Http\Controllers\BaseDoorstep;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseDoorstep\UpdateRequest;
use App\Models\BaseDoorstep;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request)
  {
      $data = $request->validated();

      $item = BaseDoorstep::find($data['id']);
      if ($item == null) {
          return response()->json(['message' => 'Крепеж не найден.']);
      }

      if (isset($data['scheme']) && !is_file($data['scheme']) && !is_string($data['scheme'])) {
        return json_encode(['message' => 'В данное поле нужно загрузить файл или строчный тип данных.']);
      }

      if (isset($data['scheme']) && is_string($data['scheme'])) {
        $copy = 'base-doorstep/' . Str::random() . explode('/', $data['scheme'])[1];
        $file = 'public/'.$data['scheme'];
        $success = Storage::copy($file, 'public/'.$copy);
        if($item['scheme'] != "")
        {
            Storage::disk('public')->delete($item['scheme']);
        }
        if ($success) {
            $data['scheme'] = $copy;
        }
    }

    if ($data['scheme'] && is_file($data['scheme'])) {
        if($item['scheme'] != "")
        {
            Storage::disk('public')->delete($item['scheme']);
        }
        $data['scheme'] = Storage::disk('public')->put('base-doorstep', $data['scheme']);
    }

      $item->update($data);

      return $item;
  }
}
